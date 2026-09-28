/**
 * Génère le kit de communication téléchargeable depuis communication.php.
 *
 * Les sources restent à leur place (logos du site, icônes des applications,
 * visuels LuSIM) ; ce script écrit dans src/image/communication/ des fichiers
 * aux noms explicites — le nom d'un fichier compte pour la recherche d'images —
 * et les exports PNG des logos vectoriels.
 *
 * Utilisation :  cd tools && npm install && node build-press-kit.mjs
 * Puis rejouer « npm run build » : les aperçus de la page passent par image/opt.
 */
import sharp from 'sharp';
import { copyFile, mkdir, rm, writeFile } from 'node:fs/promises';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const TOOLS = dirname(fileURLToPath(import.meta.url));
const ROOT = join(TOOLS, '..', 'src');
const WORKSPACE = join(TOOLS, '..', '..');
const OUT = join(ROOT, 'image', 'communication');

const PALETTE = { dominant: '#13212B', light: '#E4ECF1', accent: '#86EAE9' };

await rm(OUT, { recursive: true, force: true });
await mkdir(OUT, { recursive: true });

const out = (name) => join(OUT, name);
const written = [];
const done = (name) => written.push(name);

/* --- Logo NexSIM : SVG d'origine + PNG transparents ------------------------ */
const LOGOS = [
    // Texte clair : pour fond sombre (c'est le logo du thème sombre du site).
    { src: 'image/logo_Nexsim_dark.svg', name: 'nexsim-logo-fond-sombre' },
    // Texte foncé : pour fond clair.
    { src: 'image/logo_Nexsim_light.svg', name: 'nexsim-logo-fond-clair' },
];
for (const logo of LOGOS) {
    await copyFile(join(ROOT, logo.src), out(`${logo.name}.svg`));
    done(`${logo.name}.svg`);
    for (const width of [512, 1024, 2048]) {
        await sharp(join(ROOT, logo.src), { density: 600 })
            .resize({ width })
            .png({ compressionLevel: 9 })
            .toFile(out(`${logo.name}-${width}.png`));
        done(`${logo.name}-${width}.png`);
    }
}

/* Logo carré sur fond blanc : format attendu par les moteurs de recherche pour
   le logo d'une organisation (image matricielle, au moins 112 px, fond uni). */
{
    const size = 512;
    const inner = await sharp(join(ROOT, 'image/logo_Nexsim_light.svg'), { density: 600 })
        .resize({ width: Math.round(size * 0.8) })
        .png()
        .toBuffer();
    await sharp({ create: { width: size, height: size, channels: 4, background: '#FFFFFF' } })
        .composite([{ input: inner, gravity: 'center' }])
        .png({ compressionLevel: 9 })
        .toFile(out('nexsim-logo-carre-512.png'));
    done('nexsim-logo-carre-512.png');
}

/* --- Icônes des applications ----------------------------------------------- */
// NexControl : l'icône source de l'application (flutter_launcher_icons).
await copyFile(join(WORKSPACE, 'NexControl-mobile/assets/icon/icon.png'), out('nexcontrol-icone-512.png'));
done('nexcontrol-icone-512.png');

// NexHome : icône adaptative Android (vitrine Material sur l'accent), redessinée
// en SVG depuis res/drawable/ic_launcher_foreground.xml.
{
    const storefront = 'M21.9 8.89l-1.05-4.37c-.22-.9-1-1.52-1.91-1.52H5.05c-.9 0-1.69.63-1.9 1.52L2.1 8.89c-.24 1.02-.02 2.06.62 2.88.08.11.19.19.28.29V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-6.94c.09-.09.2-.18.28-.28.64-.82.87-1.87.62-2.89zm-2.99-3.9l1.05 4.37c.1.42.01.84-.25 1.17-.14.18-.44.47-.94.47-.61 0-1.14-.49-1.21-1.14L16.98 5l1.93-.01zM13 5h1.96l.54 4.52c.05.39-.07.78-.33 1.07-.22.26-.54.41-.95.41-.67 0-1.22-.59-1.22-1.31V5zM8.49 9.52L9.04 5H11v4.69c0 .72-.55 1.31-1.29 1.31-.34 0-.65-.15-.89-.41-.25-.29-.37-.68-.33-1.07zm-4.45-.16L5.05 5h1.97l-.58 4.86c-.08.65-.6 1.14-1.21 1.14-.49 0-.8-.29-.93-.47-.27-.32-.36-.75-.26-1.17zM5 19v-6.03c.08.01.15.03.23.03.87 0 1.66-.36 2.24-.95.6.6 1.4.95 2.31.95.87 0 1.65-.36 2.23-.93.59.57 1.39.93 2.29.93.84 0 1.64-.35 2.24-.95.58.59 1.37.95 2.24.95.08 0 .15-.02.23-.03V19H5z';
    const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 108 108" width="512" height="512">
  <title>Icône NexHome</title>
  <rect width="108" height="108" rx="24" fill="${PALETTE.accent}"/>
  <g transform="translate(30 30) scale(2)"><path fill="${PALETTE.dominant}" d="${storefront}"/></g>
</svg>
`;
    await writeFile(out('nexhome-icone.svg'), svg);
    done('nexhome-icone.svg');
    await sharp(Buffer.from(svg)).resize(512).png({ compressionLevel: 9 }).toFile(out('nexhome-icone-512.png'));
    done('nexhome-icone-512.png');
}

/* --- Visuels LuSIM et captures NexControl --------------------------------- */
const VISUALS = [
    { src: 'videos/poster.jpg', name: 'lusim-simulateur-pulmonaire.jpg', width: 1920 },
    { src: 'image/lusim-vr.png', name: 'lusim-realite-virtuelle.png' },
    { src: 'image/vr.jpeg', name: 'nexvr-realite-virtuelle.jpg', width: 1600 },
    { src: 'image/nexcontrol_dark.png', name: 'nexcontrol-capture-theme-sombre.jpg', width: 1600 },
    { src: 'image/nexcontrol_light.png', name: 'nexcontrol-capture-theme-clair.jpg', width: 1600 },
];
for (const visual of VISUALS) {
    const image = sharp(join(ROOT, visual.src));
    if (visual.width) image.resize({ width: visual.width, withoutEnlargement: true });
    if (visual.name.endsWith('.jpg')) {
        await image.flatten({ background: PALETTE.dominant }).jpeg({ quality: 86, mozjpeg: true }).toFile(out(visual.name));
    } else {
        await image.png({ compressionLevel: 9 }).toFile(out(visual.name));
    }
    done(visual.name);
}

console.log(`${written.length} fichiers dans src/image/communication :\n  ${written.join('\n  ')}`);
