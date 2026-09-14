<?php
/**
 * English dictionary — also used as the fallback for any key missing elsewhere.
 * Strings may contain simple HTML (<strong>, <br>, <a>): they are inserted as-is
 * by t(). Use e() inside HTML attributes.
 */
return [
    // ---------------------------------------------------------------- General
    'format.date' => 'd/m/Y',
    'site.address' => '9 Rue Becquerel, 90000 Belfort, France',

    // ------------------------------------------------------------- Navigation
    'nav.aria.main' => 'Main navigation',
    'nav.aria.home' => 'Back to home',
    'nav.logo.alt' => 'Nexsim logo',
    'nav.home' => 'Home',
    'nav.lusim' => 'LuSIM',
    'nav.digital' => 'Digital',
    'nav.offers' => 'Offers',
    'nav.pedagogy' => 'Teaching',
    'nav.team' => 'The team',
    'nav.contact' => 'Contact us',
    'nav.theme.light' => 'Switch to light theme',
    'nav.theme.dark' => 'Switch to dark theme',
    'nav.menu.open' => 'Open menu',
    'nav.menu.close' => 'Close menu',
    'nav.menu.aria' => 'Mobile menu',
    'nav.menu.title' => 'Navigation',

    // ------------------------------------------------------------------- SEO
    'seo.home.title' => 'Nexsim LuSIM | Lung simulator for medical training',
    'seo.home.description' => 'Discover LuSIM by Nexsim, the first hybrid lung simulator (physical and VR) designed to make mechanical ventilation training easier.',
    'seo.og.image.alt' => 'LuSIM lung simulator by Nexsim',
    'jsonld.product.description' => 'Next-generation hybrid lung simulator for mechanical ventilation training, combining physical robotics and virtual reality.',

    // ------------------------------------------------------ Section 1: hero
    'hero.title' => 'LuSIM',
    'hero.subtitle' => 'The lung simulator',
    'hero.lead' => 'The hybrid teaching lung for medical and paramedical training in mechanical ventilation.',
    'hero.cta.demo' => 'Request a demonstration',
    'hero.cta.discover' => 'Discover LuSIM',

    // ------------------------------------------------ Section 2: the hardware
    'phys.eyebrow' => 'The physical part',
    'phys.title' => 'A modular artificial lung',
    'phys.lead' => 'Three mechanical modules, adjustable live, reproduce the main respiratory conditions. Explore the 3D model and tap a point to locate each module.',
    'phys.aria.modules' => 'Module selection',
    'phys.hotspot.aria' => 'View the {module} module',
    'phys.expand' => 'Enlarge',
    'phys.close' => 'Close',
    'phys.viewer.alt' => '3D model of the physical part of LuSIM',
    'phys.viewer.hint' => 'Drag to rotate the model',
    'phys.panel.eyebrow' => 'Selected module',
    'phys.dialog.title' => 'LuSIM — 3D view',

    'module.compliance.label' => 'Compliance',
    'module.compliance.title' => 'Compliance module',
    'module.compliance.desc' => 'Changes the elasticity of the artificial lung to reproduce alveolar conditions that lead to the compliance disorders commonly seen in hospital.',
    'module.compliance.p1' => 'A broad range of conditions, with unilateral or bilateral involvement of the lung fields (ARDS, atelectasis, pneumothorax and more)',
    'module.compliance.p2' => 'Continuous adjustment of lung compliance, with curves close to human pathophysiology',
    'module.compliance.p3' => 'Live changes to plateau pressure, driving pressure and intrinsic PEEP',

    'module.resistance.label' => 'Resistance',
    'module.resistance.title' => 'Resistance module',
    'module.resistance.desc' => 'Adjusts the resistance of the extra-alveolar airways easily and responsively while keeping lung compliance unchanged. This module can simulate:',
    'module.resistance.p1' => 'Bronchospasm, asthma attack',
    'module.resistance.p2' => 'Laryngeal oedema',
    'module.resistance.p3' => 'Blocked endotracheal tube, saturated filter and more',

    'module.trigger.label' => 'Trigger',
    'module.trigger.title' => 'Trigger module',
    'module.trigger.desc' => 'Handles patient–ventilator interaction by simulating spontaneous inspiratory effort from the patient. Essential for teaching ventilator weaning and spotting asynchrony.',
    'module.trigger.p1' => 'Configurable spontaneous inspiratory effort',
    'module.trigger.p2' => 'Learning ventilator weaning',
    'module.trigger.p3' => 'Detection of patient–ventilator asynchrony',

    // ------------------------------------------------- Section 3: the software
    'num.eyebrow' => 'The digital part',
    'num.title' => 'See the invisible, run the session',
    'num.lead' => 'Control the LuSIM modules straight from the NexControl mobile app and adjust your scenarios in a few taps. Its intuitive interface makes it easy to pick up and keeps every session flowing. To push immersion further, LuSIM also comes with a virtual reality application that places learners at the heart of realistic clinical situations.',

    'num.app.eyebrow' => 'Mobile app',
    'num.app.title' => 'NexControl app',
    'num.app.p' => 'With NexControl, the instructor stays in control of the session in real time: adjusting the simulator settings, selecting preconfigured conditions and evolving scenarios at the pace of learning.',
    'num.app.li1' => 'Real-time adjustment of compliance, resistance and trigger',
    'num.app.li2' => 'Library of preset conditions: ARDS, COPD, asthma and more',
    'num.app.li3' => 'Evolving scenarios to match the clinical situation to your teaching goals',
    'num.app.li4' => 'Wireless connection to the physical module for smooth, unconstrained use',
    'num.app.note' => 'An intuitive interface to run the simulation at your fingertips and focus fully on teaching.',
    'num.app.img.alt' => 'The NexControl app on a tablet, controlling the LuSIM simulator',
    'num.app.placeholder.aria' => 'NexControl app visual coming soon',
    'num.app.placeholder.label' => 'NexControl app',
    'num.app.placeholder.hint' => 'Drop <code>image/nexcontrol_light.png</code> in place to show the visual',

    'num.vr.eyebrow' => 'Virtual reality',
    'num.vr.title' => 'Dive into respiratory mechanics',
    'num.vr.p' => 'An immersive, interactive experience. With virtual reality, learners see lung anatomy, physiology and pathophysiology in real time, to better grasp the mechanisms of ventilation and the consequences of every clinical decision.',
    'num.vr.li1' => 'Immediate view of how ventilator settings affect the alveolus, and of the injury that unsuitable settings can cause',
    'num.vr.li2' => 'Animated representation of the main lung diseases, synchronised with the physical module',
    'num.vr.note' => 'An immersion inside the lung that makes the invisible visible and clarifies the impact of mechanical ventilation.',
    'num.vr.img.alt' => 'A healthcare professional wearing the NexVR headset to observe the lung anatomy of LuSIM',

    // -------------------------------------------------- Section 4: our offers
    'offers.eyebrow' => 'Our offers',
    'offers.title' => 'A solution that fits your needs',
    'offers.training.title' => 'Training',
    'offers.training.p' => 'Training sessions led by practising clinical instructors and physicians, from beginner to expert level: prehospital ventilation, PICU, CCU, recovery room, intensive care, operating theatre and more, tailored to medical and paramedical profiles.',
    'offers.rent.title' => 'Rental',
    'offers.rent.p' => '<strong>Run your own training sessions, your way.</strong><br>All our products are available to rent by the week or by the month, so you can match your equipment to your needs and to your training schedule.',
    'offers.buy.title' => 'Purchase',
    'offers.buy.p' => '<strong>Make LuSIM a lasting part of your training.</strong><br>Bring LuSIM into your simulation centre, your department or your training organisation, with full commissioning, hands-on training and personalised support.',

    // ---------------------------------------------------- Section 5: teaching
    'peda.eyebrow' => 'Teaching',
    'peda.title' => 'A product built for teaching',
    'peda.subtitle' => 'Making breathing visible, so it is easier to learn',
    'peda.p' => 'Mechanical ventilation is far easier to understand when you can see its effects. Through its hands-on, immersive approach, LuSIM turns complex mechanisms into situations that make sense, supporting nurses, residents and physicians as they learn ventilation.',
    'peda.li1' => '<strong>Prevent complications</strong>: build a clearer understanding of ventilation pressures and the risk of barotrauma.',
    'peda.li2' => '<strong>Build tailor-made scenarios</strong>: change the patient\'s condition in real time to adapt every exercise.',
    'peda.li3' => '<strong>Develop clinical reasoning</strong>: confront learners with realistic pathological situations so they react better in practice.',
    'peda.tagline' => 'See, understand, decide: a new way to learn mechanical ventilation.',
    'peda.img.alt' => 'A healthcare professional wearing the NexVR headset to observe the lung anatomy of LuSIM',

    // -------------------------------------------------------- Section 6: team
    'team.eyebrow' => 'The team',
    'team.title' => 'The team behind NexSIM',
    'team.lead' => 'Professionals combining medical expertise, engineering and new technologies to design the best training solution for your hospital.',
    'team.jules.role' => 'Software engineer',
    'team.lucas.role' => 'Mechatronics engineer',
    'team.jean-sebastien.role' => 'Anaesthetist and intensive care physician',
    'team.laurent.role' => 'Ventilation expert',
    'team.fabrice.role' => 'Associate professor, AI and VR',

    // ---------------------------------------------------- Section 7: partners
    'partners.eyebrow' => 'They trust us',
    'partners.title' => 'Our partner institutions',
    'partners.aria' => 'Logos of our partner institutions',

    // ----------------------------------------------------- Section 8: contact
    'contact.title' => 'Ready to modernise your medical training?',
    'contact.p' => 'Get in touch to arrange a LuSIM demonstration at your institution, whether you represent a clinical department, a procurement team or a training centre.',
    'contact.mail' => 'Send a message',
    'contact.mail.title' => 'Send an email to Nexsim',
    'contact.linkedin' => 'Follow on LinkedIn',

    // ------------------------------------------------------------------ Footer
    'footer.legal' => 'Legal notice',
    'footer.privacy' => 'Privacy policy',
    'footer.top' => 'Back to top',
    'footer.copyright' => 'All rights reserved.',
    'footer.lang.label' => 'Language',
    'footer.lang.aria' => 'Language selection',
    'footer.lang.switch' => 'View the site in {language}',

    // ------------------------------------------------- Legal pages: shared ---
    'legal.eyebrow' => 'Legal information',
    'legal.back' => 'Back to home',
    'legal.updated' => 'Last updated: {date}',
    'legal.translation_notice' => 'Courtesy translation. Only the French version of this document is legally binding.',

    // ------------------------------------------------------- Legal notice ---
    'seo.legal.title' => 'Legal notice | Nexsim',
    'seo.legal.description' => 'Legal notice for nexsim.fr: publisher, host, intellectual property and liability.',
    'legal.title' => 'Legal notice',

    'legal.s1.title' => '1. Site publisher',
    'legal.s1.intro' => 'The website <a href="https://www.nexsim.fr/">www.nexsim.fr</a> is published by:',
    'legal.s1.form' => 'SAS, a simplified joint-stock company under French law',
    'legal.s1.capital' => 'with share capital of EUR 90,000',
    'legal.s1.email' => 'E-mail:',
    'legal.s1.director' => '<strong>Publication director:</strong> Jules Ferlin, President.',

    'legal.s2.title' => '2. Hosting',
    'legal.s2.intro' => 'The website is hosted by:',

    'legal.s3.title' => '3. Intellectual property',
    'legal.s3.p1' => 'All content on this site (text, images, videos, 3D models, logos, trademarks, graphics and software) is the exclusive property of Nexsim or its partners and is protected by the French Intellectual Property Code.',
    'legal.s3.p2' => 'Any reproduction, representation, modification, publication or adaptation of all or part of these elements, by any means whatsoever, is prohibited without the prior written consent of Nexsim.',
    'legal.s3.p3' => '"LuSIM", "NexControl" and "Nexsim" are names used by Nexsim. The logos of partner institutions remain the property of their respective owners and are displayed with their agreement.',

    'legal.s4.title' => '4. Liability',
    'legal.s4.p1' => 'Nexsim strives to provide information on this site that is as accurate as possible. However, the information published is provided for guidance only and may change. It does not constitute a contractual offer.',
    'legal.s4.p2' => 'LuSIM is a training and simulation device. It is not intended for use on patients and is not a medical device.',
    'legal.s4.p3' => 'Nexsim may not be held liable for any direct or indirect damage resulting from access to the site, its use or the inability to access it. Links to third-party sites (social networks in particular) are provided for convenience; Nexsim exercises no control over their content.',

    'legal.s5.title' => '5. Personal data and cookies',
    'legal.s5.p' => 'How personal data is processed and how cookies are used is described in our <a href="{privacy}">privacy policy</a>.',

    'legal.s6.title' => '6. Governing law',
    'legal.s6.p' => 'This legal notice is governed by French law. In the event of a dispute and failing an amicable settlement, the competent courts shall be those of the jurisdiction of the registered office of Nexsim.',

    'legal.s7.title' => '7. Credits',
    'legal.s7.p' => 'Site design and development: Nexsim. Presentation video by Léonard Jund. Open Sans typeface (SIL Open Font License). 3D viewer: <code>&lt;model-viewer&gt;</code> (Apache 2.0 licence).',

    // ------------------------------------------------------ Privacy policy ---
    'seo.privacy.title' => 'Privacy policy | Nexsim',
    'seo.privacy.description' => 'Privacy policy for nexsim.fr: data collected, purposes, retention periods, your rights and cookies.',
    'privacy.title' => 'Privacy policy',
    'privacy.intro' => 'Nexsim takes the protection of your personal data seriously. This policy describes the data that may be processed when you visit <a href="https://www.nexsim.fr/">www.nexsim.fr</a>, in accordance with the General Data Protection Regulation (GDPR) and the French Data Protection Act.',

    'privacy.s1.title' => '1. Data controller',
    'privacy.s1.p' => 'The data controller is Nexsim, 9 Rue Becquerel, 90000 Belfort, France. For any question about your data: <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>.',

    'privacy.s2.title' => '2. Data collected and purposes',
    'privacy.s2.intro' => 'This is a showcase site: it has no form, no customer area and no audience measurement tool. Processing is limited to the following cases.',
    'privacy.s2.li1' => '<strong>Contact requests by e-mail.</strong> When you write to the address shown on the site, we process your e-mail address, your name and the content of your message in order to answer your request (demonstration, quotation, information). Legal basis: pre-contractual steps taken at your request, or our legitimate interest in answering enquiries.',
    'privacy.s2.li2' => '<strong>Server technical logs.</strong> The host automatically records the IP address, the date and time of the visit, the pages viewed and the browser used, for security and maintenance purposes. Legal basis: legitimate interest in keeping the service secure.',
    'privacy.s2.li3' => '<strong>Display preferences.</strong> The language and the theme (light or dark) you choose are stored in the two preference cookies described in section 5. They contain no identifier and cannot be used to recognise you across sites.',
    'privacy.s2.li4' => '<strong>Browser language.</strong> On your first visit, your browser sends the list of your preferred languages (the <code>Accept-Language</code> header); it is used solely, for the time it takes to render the page, to select the language version of the site. It is neither stored nor passed on to any third party.',

    'privacy.s3.title' => '3. Retention periods',
    'privacy.s3.li1' => 'E-mail exchanges: as long as needed to handle the request, then at most three years from the last contact if no contractual relationship is established.',
    'privacy.s3.li2' => 'Technical logs: twelve months at most.',
    'privacy.s3.li3' => 'Preference cookies (language and theme): twelve months from the date they are set or last updated, or until you delete them from your browser.',

    'privacy.s4.title' => '4. Recipients and processors',
    'privacy.s4.intro' => 'The data is intended solely for authorised staff at Nexsim. It may be processed by our technical service providers within the limits of their assignment:',
    'privacy.s4.li1' => '<strong>Website host</strong>: OVH SAS, for hosting and technical logs.',
    'privacy.s4.li2' => '<strong>Google Fonts and Google Hosted Libraries</strong>: the Open Sans typeface and the 3D viewer component are loaded from servers operated by Google LLC. During that load, your browser sends your IP address to Google, where it may be processed in the United States under the European Commission\'s standard contractual clauses.',
    'privacy.s4.end' => 'No data is sold or transferred to third parties for commercial purposes.',

    'privacy.s5.title' => '5. Cookies and trackers',
    'privacy.s5.intro' => 'The site uses no advertising cookie, no audience measurement cookie and no third-party tracker. Only two preference cookies, set by the site itself, are used:',
    'privacy.cookies.th.name' => 'Name',
    'privacy.cookies.th.purpose' => 'Purpose',
    'privacy.cookies.th.duration' => 'Lifetime',
    'privacy.cookies.th.basis' => 'Legal basis',
    'privacy.cookies.lang.purpose' => 'Stores the display language you selected (fr, en or de).',
    'privacy.cookies.theme.purpose' => 'Stores the theme you selected (light or dark).',
    'privacy.cookies.duration' => '12 months',
    'privacy.cookies.basis' => 'Exempt from consent',
    'privacy.s5.p2' => 'Both cookies are strictly necessary to provide a service you expressly requested: displaying the site in the language and with the theme you selected. They hold nothing but a preference value, with no identifier and no personal data, are issued with the <code>SameSite=Lax</code> attribute and are not accessible to any third party.',
    'privacy.s5.p3' => 'As such they fall within the trackers exempt from consent under Article 82 of the French Data Protection Act and the CNIL guidelines, so no consent banner is displayed. This policy will be updated should trackers subject to consent ever be added.',
    'privacy.s5.p4' => 'You can delete these cookies at any time from your browser settings. Once deleted, the site again displays the language announced by your browser (English if none of ours matches) and the dark theme by default.',

    'privacy.s6.title' => '6. Your rights',
    'privacy.s6.p1' => 'Under the GDPR you have the rights of access, rectification, erasure, restriction, objection and portability regarding your data, as well as the right to give instructions on what happens to your data after your death.',
    'privacy.s6.p2' => 'To exercise these rights, write to us at <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a> or by post to the address of the data controller. Proof of identity may be requested in the event of reasonable doubt. We answer within one month, extendable by two months for complex requests.',
    'privacy.s6.p3' => 'If, having contacted us, you consider that your rights are not being respected, you may lodge a complaint with the CNIL, the French data protection authority (<a href="https://www.cnil.fr/" rel="noopener" target="_blank">www.cnil.fr</a>).',

    'privacy.s7.title' => '7. Security',
    'privacy.s7.p' => 'Nexsim implements appropriate technical and organisational measures to protect your data against loss, unauthorised access or disclosure: encryption of exchanges (HTTPS), restricted access to mailboxes and regular system updates.',

    'privacy.s8.title' => '8. Links to third-party sites',
    'privacy.s8.p' => 'The site contains links to third-party services, in particular LinkedIn. These services have their own privacy policies, which we encourage you to read. Nexsim is not responsible for the processing carried out by those third parties.',

    'privacy.s9.title' => '9. Changes to this policy',
    'privacy.s9.p' => 'This policy may be updated at any time, in particular if the site or the applicable regulations change. The date of the latest update appears at the top of this page.',
];
