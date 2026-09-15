/**
 * Génère les déclinaisons responsives (AVIF + WebP) des images matricielles.
 *
 * Les fichiers d'origine restent la source de vérité dans src/image ; les
 * déclinaisons sont écrites dans src/image/opt, accompagnées d'un manifeste que
 * includes/images.php relit pour construire les balises <picture>.
 *
 * Utilisation :  cd tools && npm install && npm run build
 */
import sharp from 'sharp';
import { mkdir, writeFile, readdir, stat } from 'node:fs/promises';
import { dirname, join, extname, basename, relative } from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT = join(dirname(fileURLToPath(import.meta.url)), '..', 'src');
const OUT_DIR = join(ROOT, 'image', 'opt');

/* Largeurs demandées par usage. Une déclinaison plus large que l'original n'est
   jamais produite : agrandir ne ferait qu'alourdir le fichier sans rien ajouter. */
const GROUPS = [
    {
        /* Illustrations des sections « Numérique » et « Pédagogie ». Emplacement
           le plus large : une colonne de .split dans un conteneur de 1500 px,
           soit ~718 px CSS — 1440 px couvre les écrans à densité double. */
        name: 'contenu',
        widths: [400, 640, 900, 1200, 1440],
        quality: { avif: 58, webp: 82 },
        files: [
            'image/nexcontrol_dark.png',
            'image/nexcontrol_light.png',
            'image/vr.jpeg',
            'image/lusim-vr.png',
        ],
    },
    {
        /* Portraits de l'équipe : affichés en cercle de 104 px CSS. */
        name: 'portrait',
        widths: [104, 208, 312],
        quality: { avif: 55, webp: 80 },
        dir: 'image/person',
    },
    {
        /* Logos partenaires : 96 px de haut et 320 px de large au maximum sur
           desktop (64 / 220 sous 900 px) — 640 px couvre la densité double. */
        name: 'logo',
        widths: [320, 640],
        quality: { avif: 60, webp: 85 },
        dir: 'image/partenaires',
    },
];

const RASTER = /\.(png|jpe?g)$/i;

async function filesOf(group) {
    if (group.files) return group.files;
    const entries = await readdir(join(ROOT, group.dir));
    return entries.filter((f) => RASTER.test(f)).sort().map((f) => `${group.dir}/${f}`);
}

const manifest = {};
let totalIn = 0;
let totalOut = 0;

for (const group of GROUPS) {
    for (const rel of await filesOf(group)) {
        const src = join(ROOT, rel);
        const image = sharp(src);
        const meta = await image.metadata();
        totalIn += (await stat(src)).size;

        /* Doublons inutiles : une largeur au-delà de l'original est ramenée à
           l'original, et les largeurs répétées sont fusionnées. */
        const widths = [...new Set(group.widths.map((w) => Math.min(w, meta.width)))].sort((a, b) => a - b);

        const outBase = join(OUT_DIR, dirname(relative('image', rel)), basename(rel, extname(rel)));
        await mkdir(dirname(outBase), { recursive: true });

        const entry = { width: meta.width, height: meta.height, variants: {} };

        for (const format of ['avif', 'webp']) {
            entry.variants[format] = [];
            for (const width of widths) {
                const dest = `${outBase}-${width}.${format}`;
                const info = await sharp(src)
                    .resize({ width, withoutEnlargement: true })
                    [format]({ quality: group.quality[format] })
                    .toFile(dest);
                entry.variants[format].push(width);
                totalOut += info.size;
            }
        }

        manifest[rel] = entry;
        console.log(`${group.name.padEnd(9)} ${rel} (${meta.width}x${meta.height}) → ${widths.join(', ')}`);
    }
}

await writeFile(join(OUT_DIR, 'manifest.json'), JSON.stringify(manifest, null, 2) + '\n');

const mib = (n) => (n / 1024 / 1024).toFixed(2) + ' Mio';
console.log(`\noriginaux : ${mib(totalIn)} — déclinaisons : ${mib(totalOut)}`);
