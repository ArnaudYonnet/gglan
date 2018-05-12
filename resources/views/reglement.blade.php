@extends('layouts.template')

@section('content')
    <div class="row">
        {{-- <div class="col-lg-8 mx-auto">
            <h2><u>Reglement de GG-LAN</u></h2>
            <p>
                Cet événement est organisé par l’association GOOD GAME - LAN (GG-LAN), régie par la loi du 1er juillet 1901.
                C’est une compétition de jeux vidéo, telle expliquée par l’article L321-8 : “Une compétition de jeux vidéo confronte, à partir d'un jeu vidéo, 
                au moins deux joueurs ou équipes de joueurs pour un score ou une victoire”
                C’est une LAN de type BYOC (Bring Your Own Computer = Amène ton propre PC), 
                ce qui signifie que les joueurs devront amener leur propre matériel pour pouvoir participer aux tournois.
            </p>

            <p>
                Règlement :
                Les organisateurs se réservent le droit d’expulser toutes personnes ne respectant pas ce règlement.
                Les lois françaises sont toujours en vigueur lors de l’événement : le participant se doit de les respecter à tout moment.
                
                <h5>I_ Participants mineurs</h5>
                <ul>
                    <li>Le décret n°2017-871 du 9 mai 2017 instaure de nouvelles règles quant à la participation des mineurs aux compétitions de jeux vidéo.</li>
                    <li>La participation d'enfants de moins de douze ans à des compétitions de jeux vidéo offrant des récompenses monétaires est
                    interdite. (Art. R. 321-44.)</li>
                    <li>Le mineur et le ou les représentants légaux justifient de leur identité par la présentation de leur carte nationale d'identité
                    ou passeport délivrés par l'administration compétente de l'État dont le titulaire possède la nationalité (ces documents doivent
                    être en cours de validité, à l'exception de la carte nationale d'identité française et du passeport français, qui peuvent
                    être présentés en cours de validité ou périmés depuis moins de 5 ans). Les participants mineurs doivent également fournir
                    une autorisation de leur représentant légal, avec le numéro, la nature et l’autorité de délivrance du document d’identité
                    du ou des représentants légaux et du mineur concerné. (Art. R. 321-43.)</li>
                    <li>La part des récompenses monétaires, perçues par un enfant âgé de moins de seize ans soumis à l’obligation scolaire dans le
                    cadre de sa participation à des compétitions de jeux vidéo est définie telle que : Une part de la rémunération perçue par
                    l'enfant peut être laissée à la disposition de ses représentants légaux. Le surplus, qui constitue le pécule, est versé à
                    la Caisse des dépôts et consignations et géré par cette caisse jusqu'à la majorité de l'enfant. Des prélèvements peuvent
                    être autorisés en cas d'urgence et à titre exceptionnel. (Art. R. 321-45.)</li>
                </ul>

                <h5>II_ Inscription aux tournois</h5>
                <ul>
                    <li>Pour vous inscrire au tournoi il vous faut vous créer un compte sur le site gglan.fr , puis rejoindre ou créer une équipe.
                    Une fois cette équipe complète (5 joueurs), vous pourrez inscrire l’équipe au tournoi (onglet “Tournois”), et ainsi votre
                    place sera réservée pour le jour de la LAN. Cependant, votre inscription ne sera officiellement finalisée que lorsque vous
                    aurez payé les droits d’inscriptions le jour-même. Si vous n’avez payé cette somme, vous n’aurez pas le droit de participer
                    au tournoi.</li>
                    <li>Les joueurs de moins de douze ans n’ont pas le droit de s’inscrire ni de participer au tournoi. Les joueurs mineurs (âge
                    compris entre 12 et 18) devront compléter une autorisation parentale accompagnée d’une copie recto/verso de leur pièce d’identité
                    et de celle de leur représentant légal et la fournir avec leur droit d’inscription le jour-même afin de pouvoir participer
                    au tournoi.</li>
                    <li>Les joueurs mineurs sont présents sous la responsabilité de leurs parents.</li>
                    <li>Lien pour télécharger l’autorisation parentale :
                    </li>
                    <li>Les joueurs qui possèdent un bannissement sur le jeu du tournoi (dans le cas de CS:GO, un ban Overwatch ou un ban VAC), sont
                    soumis à un jugement de leur inscription par les organisateurs : après observation du cas de l’individu, son inscription
                    sera retenue ou non. Toute personne possédant un bannissement sur le jeu et ne le signalant pas sera contraint d’abandonner
                    sa place du tournoi.</li>
                    <li>L’individu qui s’inscrit certifie que les informations qu’il entre sur le site sont correctes et authentiques.</li>
                    <li>Le jour-même, tous les joueurs (mineurs ou majeurs) devront présenter leur pièce d’identité afin de prouver leur identité
                    pour participer au tournoi.</li>
                </ul>

                <h5>III_ Règlement intérieur</h5>
                Les organisateurs ne pourront en aucun cas être tenus responsables :
                <ul>
                    <li>quant aux agissements des participants en dehors de l’enceinte de la manifestation</li>
                    <li>quant aux vols, à la casse, de la dégradation du matériel des participants</li>
                    <li>Les assurances de l’association GG-LAN et de Brest Open Campus assureront le bon déroulement du tournoi dans l’enceinte de
                    l’établissement. Cependant, si tout dommage ou dégradation sont infligés à l’encontre du matériel des organisateurs et de
                    l’établissement, le participant auteur des faits sera contraint de réparer ces dommages financièrement.</li>
                    <li>La consommation d’alcool et/ou de stupéfiants est formellement interdite. De même qu’il est interdit de fumer (cigarette
                    ou cigarette électronique) dans l’enceinte de l’établissement. Toute personne sous influence de stupéfiants ou en état d’ébriété
                    ne sera pas accepté sur le lieu de la manifestation.</li>
                    <li>Toute manipulation informatique ou électrique est interdite. De même que tout acte de piratage informatique ou de téléchargement
                    illégal sera condamné comme la loi le prescrit.</li>
                    <li>Tout comportement jugé inapproprié par les organisateurs sera jugé en conséquence, pouvant entraîner des pénalités au niveau
                    du tournoi jusqu’à l’expulsion du lieu de la manifestation.</li>
                    <li>Les animaux ne sont pas autorisés.</li>
                    <li>Le règlement intérieur de Brest Open Campus s’applique en plus du règlement proposé par GG-LAN.</li>
                </ul>

                <h5>IV_ Spectateurs et personnes extérieures à l’événement</h5>
                <ul>
                    <li>Les “spectateurs”, c’est-à-dire les personnes ne participant pas au tournoi mais qui sont tout de même sur place, sont acceptés.
                    Il n’ont pas de droit d’inscription à payer. Cependant, ils sont tenus de respecter les règlement imposé par GG-LAN et le
                    règlement intérieur du lieu de la manifestation.</li>
                    <li>Tout spectateur présent doit déclarer sa présence à au moins un organisateur du tournoi.</li>
                    <li>Les spectateurs sont acceptés aux heures où se déroule le tournoi. En dehors de ce temps-là, ils ne sont plus autorisés à
                    se trouver sur le lieu de la manifestation.</li>
                </ul>

                <h5>V_ Règlement in-game</h5>
                <ul>
                    <li>Ci-bas sera évoqué le règlement qui s’appliquera lors des parties, et le règlement concernant notamment tous les aspects
                    autour des parties.</li>
                </ul>
 
                <h5>V-I_ Tricherie</h5>
                <ul>
                    <li>Toute équipe a le droit de demander les démos des parties qu’ils ont joué immédiatement s’ils suspectent un acte de tricherie
                    commis par l’équipe adverse.</li>
                    <li>Si un acte de tricherie est repéré soit dans l’immédiat (par les joueurs autour) soit par des joueurs sur une démo, alors
                    cet acte sera jugé par les organisateurs qui pourront disqualifier l’équipe s’il s’avère qu’il y a vraiment eu acte de tricherie.</li>
                    <li>Toute tricherie constatée lors du tournoi entraînera le bannissement du joueur des futures compétitions organisées par GG-LAN
                    jusqu’à nouvel ordre.</li>
                    <li>Tout acte de “throw” (perdre intentionnellement pour profiter d’un gain par la suite) sera examiné par les organisateurs,
                    qui pourront disqualifier l’équipe du tournoi s’il s’avère qu’elle a “throw” une partie.</li>
                </ul>

                <h5>V-II_ Assiduité</h5>
                <ul>
                    <li>Lorsqu’une équipe a un match à jouer, elle se doit d’être présente pour jouer ce match. Si cette équipe n’est pas présente
                    dans les délais imposés par les organisateurs, alors selon ce retard, l’équipe adverse se verra attribuer d’une map d’avance
                    jusqu’à la win de toute la partie (en cas d’un Bo3), et de la win du match (en cas d’un Bo1).</li>
                </ul>
 
                <h5>V-III_ Paramètres de jeu</h5>
                <ul>
                    <li>Les matchs se déroulent sur les serveurs locaux GG-LAN. La configuration du serveur sera bientôt définie, les paramètres
                    correspondront aux paramètres utilisés dans les compétitions CS:GO actuelles (ESL, DreamHack, ELEAGUE…). Le plugin utilisé
                    est le plugin Get5, avec eBot.</li>
                    <li>Le map pool est le suivant : de_mirage, de_cache, de_cbble, de_train, de_overpass, de_nuke, de_inferno</li>
                </ul>
                Les méthodes de pick/ban sont les suivantes :
                <ul>
                    <li>Pour un Bo1 : Chaque équipe ban une map chacune son tour, jusqu’à arriver à la dernière map disponible qui sera jouée.</li>
                    <li>Pour un Bo3 : Chaque équipe va tout d’abord ban une map, puis pick sa map, et enfin ban une map, jusqu’à arriver à la dernière
                    map du Bo3 disponible qui sera jouée.</li>
                </ul>
                Pour décider quelle équipe commencera à ban, il y aura un “pierre/feuille/ciseau” en 1 manche (On est pro.)
                <ul>
                    <li>Le choix des sides s’effectuera via un knife-round avant le début de la game en Bo1.</li>
                    <li>Le choix des sides s’effectuera selon la manière suivante en Bo3 : l’équipe qui n’aura pas pick la map 1 choisira le side,
                    l’équipe adverse choisira le side sur l’autre map, les sides pour la dernière map seront décidés via un knife-round.</li>
                </ul>
                L’overtime est en MR3 (3 rounds par side), 10k (10000$ d’argent au début).

                <br /><br />

                <h5>VI_ Autres</h5>
                <ul>
                    <li>Les horaires seront affichés sur la page “Infos pratiques” du site gglan.fr. Les joueurs sont tenus d’être présents aux heures
                    indiquées sur le programme.</li>
                    <li>500€ de récompense sont mis en jeu, qui seront répartis de cette façon : 250€ pour l’équipe arrivée première, 150€ pour l’équipe
                    arrivée deuxième, 100€ pour l’équipe arrivée troisième. D’après les décrets en vigueur, nous sommes obligés de garder ce
                    cashprize et de le reverser en intégralité. Un traitement spécial est appliqué aux mineurs (cf. partie I_ du règlement).</li>
                    <li>Tout autre règle jugée importante est susceptible d’être rajoutée dans ce règlement ultérieurement.</li>
                </ul>
                
                Date de dernière modification du règlement : 15/10/2017
            </p>
        </div> --}}
        
        <div class="col-lg-8 mx-auto">
            <div>
                <p class="c6 c5"><span class="c7"></span></p>
            </div>
            <p class="c6"><span class="c7">Cet &eacute;v&eacute;nement est organis&eacute; par l&rsquo;association GOOD GAME - LAN (GG-LAN), r&eacute;gie par la loi du 1er juillet 1901.</span></p>
            <p
                class="c6"><span>C&rsquo;est une comp&eacute;tition de jeux vid&eacute;o, telle expliqu&eacute;e par l&rsquo;article L321-8 : &ldquo;</span>
                <span
                    class="c2">Une comp&eacute;tition de jeux vid&eacute;o confronte, &agrave; partir d&#39;un jeu vid&eacute;o, au moins deux joueurs
                    ou &eacute;quipes de joueurs pour un score ou une victoire&rdquo;</span>
                    </p>
                    <p class="c6"><span class="c8">C&rsquo;est une LAN de type BYOC (Bring Your Own Computer = Am&egrave;ne ton propre PC), ce qui signifie que les joueurs devront amener leur propre mat&eacute;riel pour pouvoir participer aux tournois.</span></p>
                    <p
                        class="c6 c5"><span class="c7"></span></p>
                        <p class="c6"><span class="c13">R&egrave;glement :</span></p>
                        <p class="c5 c6"><span class="c13"></span></p>
                        <p class="c6"><span class="c7">Ce r&egrave;glement est mis en oeuvre par l&rsquo;association GG-LAN, organisatrice de l&rsquo;&eacute;v&eacute;nement. C&rsquo;est l&rsquo;unique r&egrave;glement valide (avec celui du Brest Open Campus, car lieu de la manifestation).</span></p>
                        <p
                            class="c6 c5"><span class="c7"></span></p>
                            <p class="c6"><span class="c7">En participant, le joueur d&eacute;clare qu&rsquo;il comprend et accepte ces r&egrave;gles.</span></p>
                            <p
                                class="c10"><span class="c7">Les organisateurs se r&eacute;servent le droit d&rsquo;expulser toutes personnes ne respectant pas ce r&egrave;glement.</span></p>
                                <p
                                    class="c10"><span class="c7">Ce r&egrave;glement peut-&ecirc;tre &agrave; tout moment modifi&eacute; sans avis pr&eacute;alable donn&eacute; aux joueurs, et des d&eacute;cisions des organisateurs peuvent ne pas rentrer dans ce r&egrave;glement, dans le cadre o&ugrave; une situation devient trop extr&ecirc;me, afin de garantir au maximum le fair-play, la s&eacute;curit&eacute; et le bon fonctionnement de la manifestation.</span></p>
                                    <p
                                        class="c10"><span class="c7">Les lois fran&ccedil;aises sont toujours en vigueur lors de l&rsquo;&eacute;v&eacute;nement : le participant se doit de les respecter &agrave; tout moment.</span></p>
                                        <p
                                            class="c6 c5"><span class="c7"></span></p>
                                            <p class="c6"><span class="c11">I_ Participants mineurs</span></p>
                                            <p class="c6"><span class="c7">Le d&eacute;cret n&deg;2017-871 du 9 mai 2017 instaure de nouvelles r&egrave;gles quant &agrave; la participation des mineurs aux comp&eacute;titions de jeux vid&eacute;o.</span></p>
                                            <p
                                                class="c6 c5"><span class="c7"></span></p>
                                                <ul class="c9 lst-kix_tv86yzc3lpvi-0 start">
                                                    <li class="c3"><span class="c2">La participation d&#39;enfants de moins de douze ans &agrave; des comp&eacute;titions de jeux vid&eacute;o offrant des r&eacute;compenses mon&eacute;taires est interdite. (Art. R. 321-44.)</span></li>
                                                </ul>
                                                <p class="c6 c5"><span class="c2"></span></p>
                                                <ul class="c9 lst-kix_tv86yzc3lpvi-0">
                                                    <li class="c3"><span class="c2">Le mineur et le ou les repr&eacute;sentants l&eacute;gaux justifient de leur identit&eacute; par la pr&eacute;sentation de leur carte nationale d&#39;identit&eacute; ou passeport d&eacute;livr&eacute;s par l&#39;administration comp&eacute;tente de l&#39;&Eacute;tat dont le titulaire poss&egrave;de la nationalit&eacute; (ces documents doivent &ecirc;tre en cours de validit&eacute;, &agrave; l&#39;exception de la carte nationale d&#39;identit&eacute; fran&ccedil;aise et du passeport fran&ccedil;ais, qui peuvent &ecirc;tre pr&eacute;sent&eacute;s en cours de validit&eacute; ou p&eacute;rim&eacute;s depuis moins de 5 ans). Les participants mineurs doivent &eacute;galement fournir une autorisation de leur repr&eacute;sentant l&eacute;gal, avec le num&eacute;ro, la nature et l&rsquo;autorit&eacute; de d&eacute;livrance du document d&rsquo;identit&eacute; du ou des repr&eacute;sentants l&eacute;gaux et du mineur concern&eacute;. (Art. R. 321-43.)</span></li>
                                                </ul>
                                                <p class="c6 c5"><span class="c2"></span></p>
                                                <ul class="c9 lst-kix_tv86yzc3lpvi-0">
                                                    <li class="c1 c4"><span class="c2">La part des r&eacute;compenses mon&eacute;taires, per&ccedil;ues par un enfant &acirc;g&eacute; de moins de seize ans soumis &agrave; l&rsquo;obligation scolaire dans le cadre de sa participation &agrave; des comp&eacute;titions de jeux vid&eacute;o est d&eacute;finie telle que : Une part de la r&eacute;mun&eacute;ration per&ccedil;ue par l&#39;enfant peut &ecirc;tre laiss&eacute;e &agrave; la disposition de ses repr&eacute;sentants l&eacute;gaux. Le surplus, qui constitue le p&eacute;cule, est vers&eacute; &agrave; la Caisse des d&eacute;p&ocirc;ts et consignations et g&eacute;r&eacute; par cette caisse jusqu&#39;&agrave; la majorit&eacute; de l&#39;enfant. Des pr&eacute;l&egrave;vements peuvent &ecirc;tre autoris&eacute;s en cas d&#39;urgence et &agrave; titre exceptionnel. (Art. R. 321-45.)</span></li>
                                                </ul>
                                                <p class="c1 c5"><span class="c2"></span></p>
                                                <p class="c1"><span class="c11 c8">II_ Inscription aux tournois</span></p>
                                                <ul class="c9 lst-kix_tvgv0xgj6ens-0 start">
                                                    <li class="c1 c4"><span class="c2">Pour vous inscrire au tournoi il vous faut vous cr&eacute;er un compte sur le site gglan.fr , puis rejoindre ou cr&eacute;er une &eacute;quipe. Une fois cette &eacute;quipe compl&egrave;te (5 joueurs), vous pourrez inscrire l&rsquo;&eacute;quipe au tournoi (onglet &ldquo;Tournois&rdquo;), et ainsi votre place sera r&eacute;serv&eacute;e pour le jour de la LAN. Cependant, votre inscription ne sera officiellement finalis&eacute;e que lorsque vous aurez pay&eacute; les droits d&rsquo;inscriptions le jour-m&ecirc;me. Si vous n&rsquo;avez pas pay&eacute; cette somme, vous n&rsquo;aurez pas le droit de participer au tournoi.</span></li>
                                                </ul>
                                                <p class="c1 c5"><span class="c2"></span></p>
                                                <ul class="c9 lst-kix_tvgv0xgj6ens-0">
                                                    <li class="c1 c4"><span class="c2">Les joueurs de moins de douze ans n&rsquo;ont pas le droit de s&rsquo;inscrire ni de participer au tournoi. Les joueurs mineurs (&acirc;ge compris entre 12 et 18) devront compl&eacute;ter une autorisation parentale accompagn&eacute;e d&rsquo;une copie recto/verso de leur pi&egrave;ce d&rsquo;identit&eacute; et de celle de leur repr&eacute;sentant l&eacute;gal et la fournir avec leur droit d&rsquo;inscription le jour-m&ecirc;me afin de pouvoir participer au tournoi.</span></li>
                                                    <li
                                                        class="c1 c4"><span class="c2">Les joueurs mineurs sont pr&eacute;sents sous la responsabilit&eacute; de leurs parents.</span></li>
                                                        <li
                                                            class="c1 c4"><span class="c8">Lien pour t&eacute;l&eacute;charger l&rsquo;autorisation parentale : </span>
                                                            <span
                                                                class="c8 c12">&lt;bient&ocirc;t disponible&gt;</span>
                                                                </li>
                                                </ul>
                                                <p class="c1 c5"><span class="c2"></span></p>
                                                <ul class="c9 lst-kix_uuqxvc3ymmco-0 start">
                                                    <li class="c1 c4"><span class="c2">Les joueurs qui poss&egrave;dent un bannissement sur le jeu du tournoi (dans le cas de CS:GO, un ban Overwatch ou un ban VAC), sont soumis &agrave; un jugement de leur inscription par les organisateurs : apr&egrave;s observation du cas de l&rsquo;individu, son inscription sera retenue ou non. Toute personne poss&eacute;dant un bannissement sur le jeu et ne le signalant pas sera contraint d&rsquo;abandonner sa place du tournoi.</span></li>
                                                </ul>
                                                <p class="c1 c5"><span class="c2"></span></p>
                                                <ul class="c9 lst-kix_7nhds826j9q8-0 start">
                                                    <li class="c1 c4"><span class="c2">L&rsquo;individu qui s&rsquo;inscrit certifie que les informations qu&rsquo;il entre sur le site sont correctes et authentiques.</span></li>
                                                </ul>
                                                <p class="c1 c5"><span class="c2"></span></p>
                                                <ul class="c9 lst-kix_pr6zxnk309fc-0 start">
                                                    <li class="c1 c4"><span class="c2">Le jour-m&ecirc;me, tous les joueurs (mineurs ou majeurs) devront pr&eacute;senter leur pi&egrave;ce d&rsquo;identit&eacute; afin de prouver leur identit&eacute; pour participer au tournoi.</span></li>
                                                </ul>
                                                <p class="c1 c5"><span class="c2"></span></p>
                                                <p class="c1"><span class="c11 c8">III_ &nbsp;R&egrave;glement int&eacute;rieur</span></p>
                                                <p class="c1"><span class="c2">Les organisateurs ne pourront en aucun cas &ecirc;tre tenus responsables :</span></p>
                                                <ul
                                                    class="c9 lst-kix_mtp6fmkh6tc2-0 start">
                                                    <li class="c1 c4"><span class="c2">quant aux agissements des participants en dehors de l&rsquo;enceinte de la manifestation</span></li>
                                                    </ul>
                                                    <ul class="c9 lst-kix_c4izzmt66alb-0 start">
                                                        <li class="c1 c4"><span class="c2">quant aux vols, &agrave; la casse, de la d&eacute;gradation du mat&eacute;riel des participants</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_vvzc1ky7at7c-0 start">
                                                        <li class="c1 c4"><span class="c2">Les assurances de l&rsquo;association GG-LAN et de Brest Open Campus assureront le bon d&eacute;roulement du tournoi dans l&rsquo;enceinte de l&rsquo;&eacute;tablissement. Cependant, si tout dommage ou d&eacute;gradation sont inflig&eacute;s &agrave; l&rsquo;encontre du mat&eacute;riel des organisateurs et de l&rsquo;&eacute;tablissement, le participant auteur des faits sera contraint de r&eacute;parer ces dommages financi&egrave;rement.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_6k36951ojdyl-0 start">
                                                        <li class="c1 c4"><span class="c2">La consommation d&rsquo;alcool et/ou de stup&eacute;fiants est formellement interdite. De m&ecirc;me qu&rsquo;il est interdit de fumer (cigarette ou cigarette &eacute;lectronique) dans l&rsquo;enceinte de l&rsquo;&eacute;tablissement. Toute personne sous influence de stup&eacute;fiants ou en &eacute;tat d&rsquo;&eacute;bri&eacute;t&eacute; ne sera pas accept&eacute; sur le lieu de la manifestation. La sollicitation des forces de police peut &ecirc;tre possible si cas extr&ecirc;me.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_l2pkfzr8c9ta-0 start">
                                                        <li class="c1 c4"><span class="c2">Toute manipulation informatique ou &eacute;lectrique est interdite. De m&ecirc;me que tout acte de piratage informatique ou de t&eacute;l&eacute;chargement ill&eacute;gal sera condamn&eacute; comme la loi le prescrit.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_eugifsbezuk3-0 start">
                                                        <li class="c1 c4"><span class="c2">Toute surexploitation du r&eacute;seau, sans demande pr&eacute;alable aux organisateurs, est interdite (exemple du streaming, demandant beaucoup de donn&eacute;es, et si non autoris&eacute; par les organisateur, peut venir d&eacute;ranger le bon d&eacute;roulement des parties).</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_x5k90zrr88n8-0 start">
                                                        <li class="c1 c4"><span class="c2">Tout comportement jug&eacute; inappropri&eacute; par les organisateurs sera jug&eacute; en cons&eacute;quence, pouvant entra&icirc;ner des p&eacute;nalit&eacute;s au niveau du tournoi jusqu&rsquo;&agrave; l&rsquo;expulsion du lieu de la manifestation. </span></li>
                                                        <li
                                                            class="c1 c4"><span class="c2">Ainsi, tout acte de violence et de non fair-play sera condamn&eacute; par les organisateurs.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_2hfqxs2l2fym-0 start">
                                                        <li class="c1 c4"><span class="c2">Les animaux ne sont pas autoris&eacute;s.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_xnmq19i67q9h-0 start">
                                                        <li class="c1 c4"><span class="c2">Des photos/vid&eacute;os peuvent &ecirc;tre prises au cours de la manifestation. En acceptant de participer, les joueurs acceptent d&rsquo;&ecirc;tre pris en photo/vid&eacute;o, et que ces photos/vid&eacute;os soient publi&eacute;es sur les r&eacute;seaux sociaux de GG-LAN.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <ul class="c9 lst-kix_6cmimegqt56s-0 start">
                                                        <li class="c1 c4"><span class="c2">Le r&egrave;glement int&eacute;rieur de Brest Open Campus s&rsquo;applique en plus du r&egrave;glement propos&eacute; par GG-LAN.</span></li>
                                                    </ul>
                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                    <p class="c1"><span class="c11 c8">IV_ Spectateurs et personnes ext&eacute;rieures &agrave; l&rsquo;&eacute;v&eacute;nement</span></p>
                                                    <p
                                                        class="c1 c5"><span class="c2"></span></p>
                                                        <ul class="c9 lst-kix_x5wyanngno5s-0 start">
                                                            <li class="c1 c4"><span class="c2">Les &ldquo;spectateurs&rdquo;, c&rsquo;est-&agrave;-dire les personnes ne participant pas au tournoi mais qui sont tout de m&ecirc;me sur place, sont accept&eacute;s. Il n&rsquo;ont pas de droit d&rsquo;inscription &agrave; payer. Cependant, ils sont tenus de respecter les r&egrave;glement impos&eacute; par GG-LAN et le r&egrave;glement int&eacute;rieur du lieu de la manifestation.</span></li>
                                                        </ul>
                                                        <p class="c1 c5"><span class="c2"></span></p>
                                                        <ul class="c9 lst-kix_f7wpl5h7mgq5-0 start">
                                                            <li class="c1 c4"><span class="c2">Tout spectateur pr&eacute;sent doit d&eacute;clarer sa pr&eacute;sence &agrave; au moins un organisateur du tournoi. Il pr&eacute;sentera sa carte d&rsquo;identit&eacute; valide aux organisateurs afin de confirmer son identit&eacute;.</span></li>
                                                        </ul>
                                                        <p class="c1 c5"><span class="c2"></span></p>
                                                        <ul class="c9 lst-kix_vpyh3q63q34e-0 start">
                                                            <li class="c1 c4"><span class="c2">Les spectateurs sont accept&eacute;s aux heures o&ugrave; se d&eacute;roule le tournoi. En dehors de ce temps-l&agrave;, ils ne sont plus autoris&eacute;s &agrave; se trouver sur le lieu de la manifestation.</span></li>
                                                        </ul>
                                                        <p class="c1 c5"><span class="c2"></span></p>
                                                        <p class="c1"><span class="c11 c8">V_ R&egrave;glement in-game</span></p>
                                                        <p class="c1"><span class="c2">Ci-bas sera &eacute;voqu&eacute; le r&egrave;glement qui s&rsquo;appliquera lors des parties, et le r&egrave;glement concernant notamment tous les aspects autour des parties.</span></p>
                                                        <p
                                                            class="c1"><span class="c2">V-I_ Tricherie</span></p>
                                                            <ul class="c9 lst-kix_8oezsv3fhjq9-0 start">
                                                                <li class="c1 c4"><span class="c2">Toute &eacute;quipe a le droit de demander les d&eacute;mos des parties qu&rsquo;ils ont jou&eacute; imm&eacute;diatement s&rsquo;ils suspectent un acte de tricherie commis par l&rsquo;&eacute;quipe adverse.</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <ul class="c9 lst-kix_ucj4r9rfdxco-0 start">
                                                                <li class="c1 c4"><span class="c2">Si un acte de tricherie est rep&eacute;r&eacute; soit dans l&rsquo;imm&eacute;diat (par les joueurs autour) soit par des joueurs sur une d&eacute;mo, alors cet acte sera jug&eacute; par les organisateurs qui pourront disqualifier l&rsquo;&eacute;quipe s&rsquo;il s&rsquo;av&egrave;re qu&rsquo;il y a vraiment eu acte de tricherie.</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <ul class="c9 lst-kix_z7h4dsqds28n-0 start">
                                                                <li class="c1 c4"><span class="c2">Toute tricherie constat&eacute;e lors du tournoi entra&icirc;nera le bannissement du joueur des futures comp&eacute;titions organis&eacute;es par GG-LAN jusqu&rsquo;&agrave; nouvel ordre.</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <ul class="c9 lst-kix_vxb79i5zp77s-0 start">
                                                                <li class="c1 c4"><span class="c2">Tout acte de &ldquo;throw&rdquo; (perdre intentionnellement pour profiter d&rsquo;un gain par la suite) sera examin&eacute; par les organisateurs, qui pourront disqualifier l&rsquo;&eacute;quipe du tournoi s&rsquo;il s&rsquo;av&egrave;re qu&rsquo;elle a &ldquo;throw&rdquo; une partie.</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <p class="c1"><span class="c2">V-II_ Assiduit&eacute;</span></p>
                                                            <ul class="c9 lst-kix_w8qw0dhqa2um-0 start">
                                                                <li class="c1 c4"><span class="c2">Lorsqu&rsquo;une &eacute;quipe a un match &agrave; jouer, elle se doit d&rsquo;&ecirc;tre pr&eacute;sente pour jouer ce match (l&rsquo;&eacute;quipe enti&egrave;re, soit 5 joueurs). Si cette &eacute;quipe n&rsquo;est pas pr&eacute;sente dans les d&eacute;lais impos&eacute;s par les organisateurs, alors selon ce retard, l&rsquo;&eacute;quipe adverse se verra attribuer d&rsquo;une map d&rsquo;avance jusqu&rsquo;&agrave; la win de toute la partie (en cas d&rsquo;un Bo3/Bo5), et de la win du match (en cas d&rsquo;un Bo1).</span></li>
                                                            </ul>
                                                            <p class="c1"><span class="c2">&nbsp;</span></p>
                                                            <ul class="c9 lst-kix_qb5qdjuzm2lk-0 start">
                                                                <li class="c1 c4"><span class="c2">Les d&eacute;lais sont indiqu&eacute;s par les organisateurs. Lors d&rsquo;un Bo3 (ou plus), il y a un intervalle de 15 minutes entre chaque map.</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <p class="c1"><span class="c2">V-III_ Param&egrave;tres de jeu</span></p>
                                                            <ul class="c9 lst-kix_v1hp2h6vp59f-0 start">
                                                                <li class="c1 c4"><span class="c2">Les matchs se d&eacute;roulent sur les serveurs locaux GG-LAN. La configuration du serveur sera bient&ocirc;t d&eacute;finie, les param&egrave;tres correspondront aux param&egrave;tres utilis&eacute;s dans les comp&eacute;titions CS:GO actuelles (ESL, DreamHack, ELEAGUE&hellip;). Le plugin utilis&eacute; est le plugin Get5, avec eBot.</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <ul class="c9 lst-kix_bookcibqfxzn-0 start">
                                                                <li class="c1 c4"><span class="c2">Le map pool est le suivant : de_mirage, de_cache, de_dust2, de_train, de_overpass, de_nuke, de_inferno</span></li>
                                                            </ul>
                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                            <p class="c1"><span class="c2">Les m&eacute;thodes de pick/ban sont les suivantes :</span></p>
                                                            <ul
                                                                class="c9 lst-kix_cs670v6h0cpc-0 start">
                                                                <li class="c1 c4"><span class="c2">Pour un Bo1 : Chaque &eacute;quipe ban une map chacune son tour, jusqu&rsquo;&agrave; arriver &agrave; la derni&egrave;re map disponible qui sera jou&eacute;e.</span></li>
                                                                <li
                                                                    class="c1 c4"><span class="c2">Pour un Bo3 : Chaque &eacute;quipe va tout d&rsquo;abord ban une map, puis pick sa map, et enfin ban une map, jusqu&rsquo;&agrave; arriver &agrave; la derni&egrave;re map du Bo3 disponible qui sera jou&eacute;e.</span></li>
                                                                    </ul>
                                                                    <p class="c1"><span class="c2">Pour d&eacute;cider quelle &eacute;quipe commencera &agrave; ban, il pourra il y avoir un &ldquo;pierre/feuille/ciseau&rdquo; en 1 manche, un lancer de pi&egrave;ce etc...</span></p>
                                                                    <p
                                                                        class="c1"><span class="c2">Le choix des sides s&rsquo;effectuera via un knife-round avant le d&eacute;but de la game en Bo1.</span></p>
                                                                        <p
                                                                            class="c1"><span class="c2">Le choix des sides s&rsquo;effectuera selon la mani&egrave;re suivante en Bo3 : l&rsquo;&eacute;quipe qui n&rsquo;aura pas pick la map 1 choisira le side, l&rsquo;&eacute;quipe adverse choisira le side sur l&rsquo;autre map, les sides pour la derni&egrave;re map seront d&eacute;cid&eacute;s via un knife-round.</span></p>
                                                                            <p
                                                                                class="c1 c5"><span class="c2"></span></p>
                                                                                <ul class="c9 lst-kix_alnk1cqxkwhh-0 start">
                                                                                    <li class="c1 c4"><span class="c2">L&rsquo;overtime est en MR3 (3 rounds par side), 10k (10000$ d&rsquo;argent au d&eacute;but).</span></li>
                                                                                </ul>
                                                                                <p class="c1"><span class="c2">V-IV_ Reprise de round suite &agrave; un incident</span></p>
                                                                                <p
                                                                                    class="c1"><span class="c2">Le mot &ldquo;incident&rdquo; inclut les situations suivantes : crash serveur, d&eacute;connexion non intentionnelle d&rsquo;un joueur</span></p>
                                                                                    <ul
                                                                                        class="c9 lst-kix_nbr3j523hv7k-0 start">
                                                                                        <li class="c1 c4"><span class="c2">Si l&rsquo;incident se produit avant qu&rsquo;un kill ait eu lieu lors du round, le round entier sera rejou&eacute;.</span></li>
                                                                                        </ul>
                                                                                        <p class="c1 c5"><span class="c2"></span></p>
                                                                                        <ul class="c9 lst-kix_71ywp6t3gs6b-0 start">
                                                                                            <li class="c1 c4"><span class="c2">Si l&rsquo;incident se produit apr&egrave;s qu&rsquo;un kill ait eu lieu, chaque situation doit &ecirc;tre examin&eacute;e au cas par cas. De nombreux facteurs entrent en jeu, tels que la situation &eacute;conomique, le nombre de personnes tu&eacute;es&hellip; Une d&eacute;cision &agrave; l&rsquo;amiable peut &ecirc;tre conseill&eacute;e. Si elle n&rsquo;aboutit pas, les organisateurs ont le dernier mot quoi qu&rsquo;il arrive. G&eacute;n&eacute;ralement, un restart du round avec un nouveau startmoney est pr&eacute;conis&eacute;. Les joueurs sont invit&eacute;s &agrave; faire preuve de bonne foi et de fair-play.</span></li>
                                                                                        </ul>
                                                                                        <p class="c1"><span class="c2">V-V_ Apr&egrave;s-match</span></p>
                                                                                        <ul
                                                                                            class="c9 lst-kix_21f4b9atkb5g-0 start">
                                                                                            <li class="c1 c4"><span class="c2">Apr&egrave;s chaque partie jou&eacute;e, les joueurs sont tenus d&rsquo;aller informer les organisateurs du score final du match. </span></li>
                                                                                            </ul>
                                                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                                                            <ul class="c9 lst-kix_21f4b9atkb5g-0">
                                                                                                <li class="c1 c4"><span class="c2">Apr&egrave;s chaque partie jou&eacute;e, les joueurs sont tenus de se renseigner sur l&rsquo;heure de d&eacute;but de leur prochain match. Dans le cas de diff&eacute;rents Bo1, ce temps sera indiqu&eacute; directement par les organisateurs. Dans le cas d&rsquo;un Bo3, il y a un intervalle de 15 minutes entre les diff&eacute;rentes maps.</span></li>
                                                                                            </ul>
                                                                                            <p class="c1 c5"><span class="c2"></span></p>
                                                                                            <p class="c1"><span class="c2">V-VI_ Autre</span></p>
                                                                                            <ul
                                                                                                class="c9 lst-kix_hqaz181xa6cl-0 start">
                                                                                                <li class="c1 c4"><span class="c2">En cas de probl&egrave;me ou de conflit autour d&rsquo;une d&eacute;cision &agrave; prendre qui n&rsquo;est pas renseign&eacute;e dans le r&egrave;glement, ce sont les organisateurs qui ont le dernier mot.</span></li>
                                                                                                </ul>
                                                                                                <p class="c1 c5"><span class="c2"></span></p>
                                                                                                <ul class="c9 lst-kix_9c6eyrtj5z8m-0 start">
                                                                                                    <li class="c1 c4"><span class="c2">Toute exploitation de bugs/glitchs pr&eacute;sents dans le jeu est formellement interdite.</span></li>
                                                                                                </ul>
                                                                                                <p class="c1 c5"><span class="c2"></span></p>
                                                                                                <ul class="c9 lst-kix_6v89et5cg0kg-0 start">
                                                                                                    <li class="c1 c4"><span class="c2">Les joueurs ne doivent pas mettre en pause la partie sans raison valable (les seules raisons valables sont les probl&egrave;mes techniques, et l&rsquo;impossibilit&eacute; de jouer dans de bonnes conditions (lag serveur/connexion internet)). De m&ecirc;me que la multiplication des pauses sera sanctionn&eacute;e. La pause tactique n&rsquo;est pas comprise dans cette r&egrave;gle.</span></li>
                                                                                                </ul>
                                                                                                <p class="c1 c5"><span class="c2"></span></p>
                                                                                                <p class="c1"><span class="c11 c8">VI_ Autres</span></p>
                                                                                                <ul
                                                                                                    class="c9 lst-kix_9pc23yeays5m-0 start">
                                                                                                    <li class="c1 c4"><span class="c2">Les horaires sont annonc&eacute;s par les organisateurs. Les joueurs sont tenus d&rsquo;&ecirc;tre pr&eacute;sents aux heures indiqu&eacute;es sur le programme. Des sanctions peuvent &ecirc;tre appliqu&eacute;es en cas de retard.</span></li>
                                                                                                    </ul>
                                                                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                                                                    <ul class="c9 lst-kix_q0b7coofr2la-0 start">
                                                                                                        <li class="c1 c4"><span class="c2">D&rsquo;apr&egrave;s les d&eacute;crets en vigueur, nous sommes oblig&eacute;s de reverser le cashprize dans son int&eacute;gralit&eacute;. Un traitement sp&eacute;cial est appliqu&eacute; aux mineurs (cf. partie I_ du r&egrave;glement).</span></li>
                                                                                                    </ul>
                                                                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                                                                    <ul class="c9 lst-kix_f3naejv3tmze-0 start">
                                                                                                        <li class="c1 c4"><span class="c2">Tout autre r&egrave;gle jug&eacute;e importante est susceptible d&rsquo;&ecirc;tre rajout&eacute;e dans ce r&egrave;glement ult&eacute;rieurement.</span></li>
                                                                                                    </ul>
                                                                                                    <p class="c1 c5"><span class="c2"></span></p>
                                                                                                    <p class="c1"><span class="c8">Date de derni&egrave;re modification du r&egrave;glement : 12/05/2018</span></p>
                                                                                                    <p
                                                                                                        class="c1 c5"><span class="c2"></span></p>
                                                                                                        <p class="c6 c5"><span class="c2"></span></p>
        </div>
    </div>
@endsection