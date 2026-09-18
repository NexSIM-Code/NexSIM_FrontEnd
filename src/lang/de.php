<?php
/**
 * Deutsches Wörterbuch.
 * Die Texte dürfen einfaches HTML enthalten (<strong>, <br>, <a>) und werden von
 * t() unverändert eingefügt. In HTML-Attributen e() verwenden.
 */
return [
    // --------------------------------------------------------------- Allgemein
    'format.date' => 'd.m.Y',
    'site.address' => 'Crunch Lab, 13 Rue Ernest Thierry-Mieg, 90000 Belfort, Frankreich',

    // -------------------------------------------------------------- Navigation
    'nav.aria.main' => 'Hauptnavigation',
    'nav.aria.home' => 'Zurück zur Startseite',
    'nav.logo.alt' => 'Nexsim-Logo',
    'nav.home' => 'Startseite',
    'nav.lusim' => 'LuSIM',
    'nav.digital' => 'Digital',
    'nav.offers' => 'Angebote',
    'nav.pedagogy' => 'Didaktik',
    'nav.team' => 'Das Team',
    'nav.contact' => 'Kontakt',
    'nav.partners' => 'Partner',
    'nav.theme.light' => 'Helles Design aktivieren',
    'nav.theme.dark' => 'Dunkles Design aktivieren',
    'nav.menu.open' => 'Menü öffnen',
    'nav.menu.close' => 'Menü schließen',
    'nav.menu.aria' => 'Mobiles Menü',
    'nav.menu.title' => 'Navigation',

    // -------------------------------------------------------------------- SEO
    'seo.home.title' => 'Nexsim LuSIM | Lungensimulator für die medizinische Ausbildung',
    'seo.home.description' => 'Entdecken Sie LuSIM von Nexsim, den ersten hybriden Lungensimulator (physisch und VR) für eine einfachere Ausbildung in maschineller Beatmung.',
    'seo.og.image.alt' => 'Lungensimulator LuSIM von Nexsim',
    'jsonld.video.name' => 'LuSIM im Einsatz: der hybride Lungensimulator von Nexsim',
    'jsonld.video.description' => 'Vorführung des Lungensimulators LuSIM: die modulare künstliche Lunge in Bewegung und eine Beatmungssitzung aus Sicht der Steuerungsoberfläche.',
    'jsonld.organization.description' => 'Nexsim entwickelt innovative Lösungen für die medizinische Ausbildung, die physische Simulation und virtuelle Realität kombinieren.',

    // ---------------------------------------------------- Abschnitt 1: Einstieg
    'hero.title' => 'LuSIM',
    'hero.subtitle' => 'Der Lungensimulator',
    'hero.lead' => 'Die hybride Lehrlunge für die medizinische und pflegerische Ausbildung in maschineller Beatmung.',
    'hero.cta.demo' => 'Demonstration anfragen',
    'hero.cta.discover' => 'LuSIM entdecken',

    // ------------------------------------------------- Abschnitt 2: Die Hardware
    'phys.eyebrow' => 'Der physische Teil',
    'phys.title' => 'Eine modulare künstliche Lunge',
    'phys.lead' => 'Drei mechanische Module, live steuerbar, bilden die wichtigsten Atemwegserkrankungen nach. Erkunden Sie das 3D-Modell und tippen Sie auf einen Punkt, um die einzelnen Module zu finden.',
    'phys.aria.modules' => 'Modulauswahl',
    'phys.hotspot.aria' => 'Modul {module} anzeigen',
    'phys.expand' => 'Vergrößern',
    'phys.close' => 'Schließen',
    'phys.viewer.alt' => '3D-Modell des physischen Teils von LuSIM',
    'phys.viewer.hint' => 'Ziehen, um das Modell zu drehen',
    'phys.panel.eyebrow' => 'Ausgewähltes Modul',
    'phys.dialog.title' => 'LuSIM — 3D-Ansicht',

    'module.compliance.label' => 'Compliance',
    'module.compliance.title' => 'Compliance-Modul',
    'module.compliance.desc' => 'Verändert die Elastizität der künstlichen Lunge, um alveoläre Krankheitsbilder nachzubilden, die zu den im Krankenhaus häufigen Compliance-Störungen führen.',
    'module.compliance.p1' => 'Breites Spektrum an Krankheitsbildern mit ein- oder beidseitiger Beteiligung der Lungenfelder (ARDS, Atelektasen, Pneumothorax …)',
    'module.compliance.p2' => 'Stufenlose Einstellung der Lungencompliance, mit Kurven nahe an der menschlichen Pathophysiologie',
    'module.compliance.p3' => 'Veränderung von Plateaudruck, Driving Pressure und intrinsischem PEEP in Echtzeit',

    'module.resistance.label' => 'Resistance',
    'module.resistance.title' => 'Resistance-Modul',
    'module.resistance.desc' => 'Verändert den Widerstand der extraalveolären Atemwege einfach und unmittelbar, während die Lungencompliance unverändert bleibt. Dieses Modul simuliert:',
    'module.resistance.p1' => 'Bronchospasmus, Asthmaanfall',
    'module.resistance.p2' => 'Larynxödem',
    'module.resistance.p3' => 'Verlegter Tubus, gesättigter Filter …',

    'module.trigger.label' => 'Trigger',
    'module.trigger.title' => 'Trigger-Modul',
    'module.trigger.desc' => 'Steuert die Interaktion zwischen Patient und Beatmungsgerät, indem eine eigenständige Inspirationsanstrengung des Patienten simuliert wird. Entscheidend für die Lehre der Beatmungsentwöhnung und das Erkennen von Asynchronien.',
    'module.trigger.p1' => 'Einstellbare spontane Inspirationsanstrengung',
    'module.trigger.p2' => 'Erlernen der Beatmungsentwöhnung',
    'module.trigger.p3' => 'Erkennen von Patienten-Beatmungsgerät-Asynchronien',

    // ------------------------------------------------ Abschnitt 3: Die Software
    'num.eyebrow' => 'Der digitale Teil',
    'num.title' => 'Das Unsichtbare sehen, die Sitzung steuern',
    'num.lead' => 'Steuern Sie die LuSIM-Module bequem über die mobile App NexControl und passen Sie Ihre Szenarien mit wenigen Handgriffen an. Die intuitive Oberfläche erleichtert den Einstieg und lässt jede Sitzung flüssig ablaufen. Für noch mehr Immersion wird LuSIM durch eine Anwendung für virtuelle Realität ergänzt, die Lernende mitten in realistische klinische Situationen versetzt.',

    'num.app.eyebrow' => 'Mobile App',
    'num.app.title' => 'App NexControl',
    'num.app.p' => 'Mit NexControl behält die Lehrkraft die Sitzung in Echtzeit im Griff: Sie passt die Parameter des Simulators an, wählt vorkonfigurierte Krankheitsbilder aus und entwickelt die Szenarien im Lerntempo weiter.',
    'num.app.li1' => 'Einstellung von Compliance, Resistance und Trigger in Echtzeit',
    'num.app.li2' => 'Bibliothek vorgespeicherter Krankheitsbilder: ARDS, COPD, Asthma …',
    'num.app.li3' => 'Weiterentwickelbare Szenarien, um die klinische Situation an die Lernziele anzupassen',
    'num.app.li4' => 'Drahtlose Verbindung zum physischen Modul für einen reibungslosen Einsatz ohne Kabel',
    'num.app.note' => 'Eine intuitive Oberfläche, um die Simulation mit einem Fingertipp zu steuern und sich ganz auf die Didaktik zu konzentrieren.',
    'num.app.img.alt' => 'Die App NexControl auf einem Tablet, die den Simulator LuSIM steuert',
    'num.app.placeholder.aria' => 'Bild der App NexControl folgt in Kürze',
    'num.app.placeholder.label' => 'App NexControl',
    'num.app.placeholder.hint' => 'Legen Sie <code>image/nexcontrol_light.png</code> ab, um das Bild anzuzeigen',

    'num.vr.eyebrow' => 'Virtuelle Realität',
    'num.vr.title' => 'Tauchen Sie ein in die Atemmechanik',
    'num.vr.p' => 'Ein immersives, interaktives Erlebnis. Mit virtueller Realität sehen Lernende Anatomie, Physiologie und Pathophysiologie der Lunge in Echtzeit und verstehen so die Mechanismen der Beatmung und die Folgen jeder klinischen Entscheidung besser.',
    'num.vr.li1' => 'Unmittelbare Darstellung der Wirkung der Beatmungseinstellungen auf die Alveole sowie möglicher Schädigungen durch unpassende Einstellungen',
    'num.vr.li2' => 'Animierte Darstellung der wichtigsten Lungenerkrankungen, synchronisiert mit dem physischen Modul',
    'num.vr.note' => 'Eine Reise ins Innere der Lunge, die das Unsichtbare sichtbar macht und die Wirkung der maschinellen Beatmung verständlich werden lässt.',
    'num.vr.img.alt' => 'Eine Pflegekraft nutzt das VR-Headset NexVR, um die Lungenanatomie von LuSIM zu betrachten',

    // ------------------------------------------- Abschnitt 4: Unsere Angebote
    'offers.eyebrow' => 'Unsere Angebote',
    'offers.title' => 'Eine Lösung, die zu Ihrem Bedarf passt',
    'offers.training.title' => 'Schulung',
    'offers.training.p' => 'Schulungen, geleitet von erfahrenen Pflegekräften und Ärztinnen und Ärzten, vom Einsteiger- bis zum Expertenniveau: präklinische Beatmung, pädiatrische und kardiologische Intensivstation, Aufwachraum, Intensivmedizin, OP … abgestimmt auf ärztliche und pflegerische Profile.',
    'offers.rent.title' => 'Miete',
    'offers.rent.p' => '<strong>Gestalten Sie Ihre Schulungen völlig eigenständig.</strong><br>Alle unsere Produkte sind wochen- oder monatsweise mietbar, damit Sie Ihre Ausstattung mühelos an Ihren Bedarf und Ihren Schulungsrhythmus anpassen können.',
    'offers.buy.title' => 'Kauf',
    'offers.buy.p' => '<strong>Machen Sie LuSIM zu einem festen Bestandteil Ihrer Ausbildung.</strong><br>Integrieren Sie LuSIM in Ihr Simulationszentrum, Ihre Abteilung oder Ihre Bildungseinrichtung, inklusive vollständiger Inbetriebnahme, Einweisung und persönlicher Begleitung.',

    // ------------------------------------------------- Abschnitt 5: Didaktik
    'peda.eyebrow' => 'Didaktik',
    'peda.title' => 'Ein Produkt im Dienst der Lehre',
    'peda.subtitle' => 'Das Atmen sichtbar machen, um es besser zu lernen',
    'peda.p' => 'Maschinelle Beatmung wird deutlich verständlicher, wenn man ihre Wirkung sehen kann. Durch seinen anschaulichen und immersiven Ansatz macht LuSIM aus komplexen Mechanismen nachvollziehbare Situationen und begleitet Pflegekräfte, Assistenzärztinnen und -ärzte sowie Fachärzte beim Erlernen der Beatmung.',
    'peda.li1' => '<strong>Komplikationen vorbeugen</strong>: Beatmungsdrücke und das Risiko eines Barotraumas besser verstehen.',
    'peda.li2' => '<strong>Maßgeschneiderte Szenarien erstellen</strong>: den Zustand des Patienten in Echtzeit verändern und jede Übung anpassen.',
    'peda.li3' => '<strong>Klinisches Denken entwickeln</strong>: Lernende mit realistischen Krankheitsbildern konfrontieren, damit sie in der Praxis sicherer reagieren.',
    'peda.tagline' => 'Sehen, verstehen, entscheiden: ein neuer Weg, maschinelle Beatmung zu lernen.',
    'peda.img.alt' => 'Eine Pflegekraft nutzt das VR-Headset NexVR, um die Lungenanatomie von LuSIM zu betrachten',

    // ----------------------------------------------------- Abschnitt 6: Team
    'team.eyebrow' => 'Das Team',
    'team.title' => 'Das Team hinter NexSIM',
    'team.lead' => 'Fachleute, die medizinische Expertise, Ingenieurwesen und neue Technologien vereinen, um die beste Ausbildungslösung für Ihr Krankenhaus zu entwickeln.',
    'team.jules.role' => 'Informatikingenieur',
    'team.lucas.role' => 'Mechatronikingenieur',
    'team.jean-sebastien.role' => 'Facharzt für Anästhesie und Intensivmedizin',
    'team.laurent.role' => 'Beatmungsexperte',
    'team.fabrice.role' => 'Dozent für KI und VR',

    // ------------------------------------------------- Abschnitt 7: Partner
    'partners.eyebrow' => 'Sie vertrauen uns',
    'partners.title' => 'Unsere Partnereinrichtungen',
    'partners.aria' => 'Logos unserer Partnereinrichtungen',

    // ------------------------------------------------- Abschnitt 8: Kontakt
    'contact.title' => 'Bereit, Ihre medizinische Ausbildung zu modernisieren?',
    'contact.p' => 'Nehmen Sie Kontakt mit uns auf, um eine Demonstration von LuSIM in Ihrer Einrichtung zu vereinbaren – ob Sie eine Fachabteilung, den Einkauf oder ein Ausbildungszentrum vertreten.',
    'contact.mail' => 'Nachricht senden',
    'contact.mail.title' => 'Eine E-Mail an Nexsim senden',
    'contact.linkedin' => 'Auf LinkedIn folgen',

    // ------------------------------------------------------------- Fußzeile
    'footer.legal' => 'Impressum',
    'footer.privacy' => 'Datenschutzerklärung',
    'footer.top' => 'Nach oben',
    'footer.copyright' => 'Alle Rechte vorbehalten.',
    'footer.lang.label' => 'Sprache',
    'footer.lang.aria' => 'Sprachauswahl',
    'footer.lang.switch' => 'Website auf {language} anzeigen',

    // --------------------------------------- Rechtliche Seiten: gemeinsam ---
    'legal.eyebrow' => 'Rechtliche Hinweise',
    'legal.back' => 'Zurück zur Startseite',
    'legal.updated' => 'Zuletzt aktualisiert: {date}',
    'legal.translation_notice' => 'Übersetzung aus Gefälligkeit. Rechtsverbindlich ist ausschließlich die französische Fassung dieses Dokuments.',

    // ------------------------------------------------------------ Impressum ---
    'seo.legal.title' => 'Impressum | Nexsim',
    'seo.legal.description' => 'Impressum der Website nexsim.fr: Herausgeber, Hosting, geistiges Eigentum und Haftung.',
    'legal.title' => 'Impressum',

    'legal.s1.title' => '1. Herausgeber der Website',
    'legal.s1.intro' => 'Die Website <a href="https://www.nexsim.fr/">www.nexsim.fr</a> wird herausgegeben von:',
    'legal.s1.form' => 'SAS, vereinfachte Aktiengesellschaft französischen Rechts',
    'legal.s1.capital' => 'mit einem Stammkapital von 90.000 EUR',
    'legal.s1.email' => 'E-Mail:',
    'legal.s1.director' => '<strong>Verantwortlich für den Inhalt:</strong> Jules Ferlin, Präsident.',

    'legal.s2.title' => '2. Hosting',
    'legal.s2.intro' => 'Die Website wird gehostet von:',

    'legal.s3.title' => '3. Geistiges Eigentum',
    'legal.s3.p1' => 'Sämtliche Inhalte dieser Website (Texte, Bilder, Videos, 3D-Modelle, Logos, Marken, Grafiken und Software) sind ausschließliches Eigentum von Nexsim oder seiner Partner und durch das französische Gesetzbuch über geistiges Eigentum geschützt.',
    'legal.s3.p2' => 'Jede Vervielfältigung, Wiedergabe, Änderung, Veröffentlichung oder Anpassung dieser Elemente, ganz oder teilweise und unabhängig vom verwendeten Mittel, ist ohne vorherige schriftliche Zustimmung von Nexsim untersagt.',
    'legal.s3.p3' => '„LuSIM“, „NexControl“ und „Nexsim“ sind von Nexsim verwendete Bezeichnungen. Die Logos der Partnereinrichtungen bleiben Eigentum ihrer jeweiligen Inhaber und werden mit deren Zustimmung angezeigt.',

    'legal.s4.title' => '4. Haftung',
    'legal.s4.p1' => 'Nexsim ist bemüht, auf dieser Website möglichst genaue Informationen bereitzustellen. Die veröffentlichten Angaben sind jedoch unverbindlich und können sich ändern. Sie stellen kein Vertragsangebot dar.',
    'legal.s4.p2' => 'LuSIM ist ein Ausbildungs- und Simulationsgerät. Es ist nicht für den Einsatz am Patienten bestimmt und stellt kein Medizinprodukt dar.',
    'legal.s4.p3' => 'Nexsim haftet nicht für direkte oder indirekte Schäden, die sich aus dem Zugang zur Website, ihrer Nutzung oder der Unmöglichkeit des Zugriffs ergeben. Links zu Websites Dritter (insbesondere sozialen Netzwerken) dienen der Bequemlichkeit; Nexsim hat keinerlei Kontrolle über deren Inhalte.',

    'legal.s5.title' => '5. Personenbezogene Daten und Cookies',
    'legal.s5.p' => 'Wie personenbezogene Daten verarbeitet und Cookies eingesetzt werden, ist in unserer <a href="{privacy}">Datenschutzerklärung</a> beschrieben.',

    'legal.s6.title' => '6. Anwendbares Recht',
    'legal.s6.p' => 'Dieses Impressum unterliegt französischem Recht. Im Streitfall und mangels gütlicher Einigung sind die Gerichte am Sitz von Nexsim zuständig.',

    'legal.s7.title' => '7. Credits',
    'legal.s7.p' => 'Konzeption und Umsetzung der Website: Nexsim. Präsentationsvideo von Léonard Jund. Schriftart Open Sans (SIL Open Font License). 3D-Viewer: <code>&lt;model-viewer&gt;</code> (Apache-2.0-Lizenz).',

    // --------------------------------------------------- Datenschutzerklärung ---
    'seo.privacy.title' => 'Datenschutzerklärung | Nexsim',
    'seo.privacy.description' => 'Datenschutzerklärung der Website nexsim.fr: erhobene Daten, Zwecke, Speicherfristen, Rechte der betroffenen Personen und Cookies.',
    'privacy.title' => 'Datenschutzerklärung',
    'privacy.intro' => 'Nexsim misst dem Schutz Ihrer personenbezogenen Daten große Bedeutung bei. Diese Erklärung beschreibt, welche Daten bei Ihrem Besuch auf <a href="https://www.nexsim.fr/">www.nexsim.fr</a> verarbeitet werden können, im Einklang mit der Datenschutz-Grundverordnung (DSGVO) und dem französischen Datenschutzgesetz.',

    'privacy.s1.title' => '1. Verantwortlicher',
    'privacy.s1.p' => 'Verantwortlicher ist Nexsim, Crunch Lab, 13 Rue Ernest Thierry-Mieg, 90000 Belfort, Frankreich. Bei Fragen zu Ihren Daten: <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a>.',

    'privacy.s2.title' => '2. Erhobene Daten und Zwecke',
    'privacy.s2.intro' => 'Diese Website ist eine reine Informationsseite: Sie enthält kein Formular, keinen Kundenbereich und kein Werkzeug zur Reichweitenmessung. Die Verarbeitung beschränkt sich auf die folgenden Fälle.',
    'privacy.s2.li1' => '<strong>Kontaktanfragen per E-Mail.</strong> Wenn Sie uns an die auf der Website angegebene Adresse schreiben, verarbeiten wir Ihre E-Mail-Adresse, Ihren Namen und den Inhalt Ihrer Nachricht, um Ihre Anfrage zu beantworten (Demonstration, Angebot, Auskunft). Rechtsgrundlage: vorvertragliche Maßnahmen auf Ihre Anfrage hin oder berechtigtes Interesse an der Beantwortung von Anfragen.',
    'privacy.s2.li2' => '<strong>Technische Serverprotokolle.</strong> Der Hoster erfasst automatisch die IP-Adresse, Datum und Uhrzeit des Besuchs, die aufgerufenen Seiten und den verwendeten Browser, zu Sicherheits- und Wartungszwecken. Rechtsgrundlage: berechtigtes Interesse an der Sicherheit des Dienstes.',
    'privacy.s2.li3' => '<strong>Anzeigeeinstellungen.</strong> Die von Ihnen gewählte Sprache und das gewählte Design (hell oder dunkel) werden in den beiden in Abschnitt 5 beschriebenen Präferenz-Cookies gespeichert. Sie enthalten keine Kennung und erlauben keine website-übergreifende Wiedererkennung.',
    'privacy.s2.li4' => '<strong>Browsersprache.</strong> Bei Ihrem ersten Besuch übermittelt Ihr Browser die Liste Ihrer bevorzugten Sprachen (Header <code>Accept-Language</code>); sie dient ausschließlich dazu, für die Dauer des Seitenaufbaus die Sprachfassung der Website auszuwählen. Sie wird weder gespeichert noch an Dritte weitergegeben.',

    'privacy.s3.title' => '3. Speicherfristen',
    'privacy.s3.li1' => 'E-Mail-Korrespondenz: so lange, wie es zur Bearbeitung der Anfrage erforderlich ist, danach höchstens drei Jahre ab dem letzten Kontakt, sofern keine Vertragsbeziehung zustande kommt.',
    'privacy.s3.li2' => 'Technische Protokolle: höchstens zwölf Monate.',
    'privacy.s3.li3' => 'Präferenz-Cookies (Sprache und Design): zwölf Monate ab dem Setzen oder der letzten Aktualisierung, oder bis Sie sie in Ihrem Browser löschen.',

    'privacy.s4.title' => '4. Empfänger und Auftragsverarbeiter',
    'privacy.s4.intro' => 'Die Daten sind ausschließlich für befugte Mitarbeitende von Nexsim bestimmt. Sie können im Rahmen ihres Auftrags von unseren technischen Dienstleistern verarbeitet werden:',
    'privacy.s4.li1' => '<strong>Hoster der Website</strong>: OVH SAS, für das Hosting und die technischen Protokolle.',
    'privacy.s4.li2' => '<strong>Google Fonts und Google Hosted Libraries</strong>: die Schriftart Open Sans und die 3D-Viewer-Komponente werden von Servern der Google LLC geladen. Dabei übermittelt Ihr Browser Ihre IP-Adresse an Google, wo sie auf Grundlage der Standardvertragsklauseln der Europäischen Kommission auch in den Vereinigten Staaten verarbeitet werden kann.',
    'privacy.s4.end' => 'Es werden keine Daten zu kommerziellen Zwecken verkauft oder an Dritte weitergegeben.',

    'privacy.s5.title' => '5. Cookies und Tracker',
    'privacy.s5.intro' => 'Die Website setzt keine Werbe-Cookies, keine Cookies zur Reichweitenmessung und keine Tracker Dritter ein. Verwendet werden ausschließlich zwei von der Website selbst gesetzte Präferenz-Cookies:',
    'privacy.cookies.th.name' => 'Name',
    'privacy.cookies.th.purpose' => 'Zweck',
    'privacy.cookies.th.duration' => 'Laufzeit',
    'privacy.cookies.th.basis' => 'Rechtsgrundlage',
    'privacy.cookies.lang.purpose' => 'Speichert die von Ihnen gewählte Anzeigesprache (fr, en oder de).',
    'privacy.cookies.theme.purpose' => 'Speichert das von Ihnen gewählte Design (hell oder dunkel).',
    'privacy.cookies.duration' => '12 Monate',
    'privacy.cookies.basis' => 'Einwilligungsfrei',
    'privacy.s5.p2' => 'Beide Cookies sind unbedingt erforderlich, um einen von Ihnen ausdrücklich gewünschten Dienst zu erbringen: die Website in der von Ihnen gewählten Sprache und mit dem gewählten Design anzuzeigen. Sie enthalten lediglich einen Präferenzwert, keine Kennung und keine personenbezogenen Daten, werden mit dem Attribut <code>SameSite=Lax</code> gesetzt und sind für Dritte nicht zugänglich.',
    'privacy.s5.p3' => 'Damit zählen sie zu den einwilligungsfreien Trackern im Sinne von Artikel 82 des französischen Datenschutzgesetzes und der Leitlinien der CNIL; ein Einwilligungsbanner wird daher nicht angezeigt. Diese Erklärung wird aktualisiert, sollten künftig einwilligungspflichtige Tracker hinzukommen.',
    'privacy.s5.p4' => 'Sie können diese Cookies jederzeit über die Einstellungen Ihres Browsers löschen. Danach zeigt die Website wieder die von Ihrem Browser angekündigte Sprache an (andernfalls Englisch) sowie standardmäßig das dunkle Design.',

    'privacy.s6.title' => '6. Ihre Rechte',
    'privacy.s6.p1' => 'Nach der DSGVO haben Sie das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung, Widerspruch und Datenübertragbarkeit sowie das Recht, Anweisungen zum Umgang mit Ihren Daten nach Ihrem Tod zu erteilen.',
    'privacy.s6.p2' => 'Zur Ausübung dieser Rechte schreiben Sie uns an <a href="mailto:contact@nexsim.fr">contact@nexsim.fr</a> oder postalisch an die Anschrift des Verantwortlichen. Bei begründeten Zweifeln kann ein Identitätsnachweis verlangt werden. Wir antworten innerhalb eines Monats, bei komplexen Anfragen verlängerbar um zwei Monate.',
    'privacy.s6.p3' => 'Wenn Sie nach Kontaktaufnahme mit uns der Ansicht sind, dass Ihre Rechte nicht gewahrt werden, können Sie Beschwerde bei der französischen Datenschutzbehörde CNIL einlegen (<a href="https://www.cnil.fr/" rel="noopener" target="_blank">www.cnil.fr</a>).',

    'privacy.s7.title' => '7. Sicherheit',
    'privacy.s7.p' => 'Nexsim trifft geeignete technische und organisatorische Maßnahmen, um Ihre Daten vor Verlust, unbefugtem Zugriff oder Offenlegung zu schützen: Verschlüsselung der Übertragung (HTTPS), beschränkter Zugriff auf die Postfächer und regelmäßige Systemaktualisierungen.',

    'privacy.s8.title' => '8. Links zu Websites Dritter',
    'privacy.s8.p' => 'Die Website enthält Links zu Diensten Dritter, insbesondere LinkedIn. Diese Dienste verfügen über eigene Datenschutzerklärungen, deren Lektüre wir empfehlen. Nexsim ist für die dort erfolgenden Verarbeitungen nicht verantwortlich.',

    'privacy.s9.title' => '9. Änderung dieser Erklärung',
    'privacy.s9.p' => 'Diese Erklärung kann jederzeit aktualisiert werden, insbesondere bei Änderungen der Website oder der Rechtslage. Das Datum der letzten Aktualisierung finden Sie oben auf dieser Seite.',

    // ------------------------------------------------------------ 404-Seite ---
    'seo.notfound.title' => 'Seite nicht gefunden | Nexsim',
    'seo.notfound.description' => 'Diese Adresse gibt es auf nexsim.fr nicht mehr. Den LuSIM-Simulator, unsere Angebote und das Team finden Sie auf der Startseite.',
    'notfound.eyebrow' => 'Fehler 404',
    'notfound.title' => 'Diese Seite gibt es nicht mehr',
    'notfound.intro' => 'Die Website bestand früher aus einer Seite je Thema. Heute passt sie auf eine einzige Seite mit mehreren Abschnitten — die aufgerufene Adresse entspricht dort nichts.',
    'notfound.guess.title' => 'Sie suchten vermutlich',
    'notfound.guess.p' => 'Der aufgerufenen Adresse nach zu urteilen ist der Abschnitt „{section}“ am ehesten gemeint.',
    'notfound.guess.cta' => 'Zu „{section}“',
    'notfound.sections.title' => 'Die Abschnitte der Website',
    'notfound.help.title' => 'Immer noch nicht fündig?',
    'notfound.help.p' => 'Schreiben Sie uns — wir sagen Ihnen, wo Sie finden, was Sie suchen.',
];
