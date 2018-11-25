<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="images/contact.jpg" alt="Boite aux lettres" />
    </div>
    <div class="contentSectionRight">
        <nav class="rightNav">
            <?= $rightNav ?>
        </nav>
        <section>
            <h2>Formulaire de Contact</h2>
            <form action="" method="post">
                <div>
                    <label for="surname">Nom <span>*</span></label>
                    <input type="text" name="surname" id="surname" placeholder="Votre nom" required />
                </div>
                <div>
                    <label>Mail <span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="abc@def.xyz" required>
                </div>
                <div>
                    <label for="subject">Sujet</label>
                    <input type="text" name="subject" id="subject" placeholder="Le sujet de votre message" />
                </div>
                <div class="textAreaBox">
                    <label for="message">Message <span>*</span></label>
                    <textarea name="message" id="message" rows="10" placeholder="Votre message" required></textarea>
                </div>
                <input type="submit" value="Envoyer" />
                <div><span>*</span>Information à renseigner obligatoirement.</div>
            </form>
        </section>
        <section>
            <h2>Autres moyens de contact</h2>
            <ul class="itemUl">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 512 512" version="1.1" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                        <g>
                            <path d="M382.81,52.521c-33.868,-33.867 -78.899,-52.521 -126.792,-52.521c-47.902,0 -92.924,18.654 -126.791,52.521c-62.676,62.667 -70.465,180.575 -16.868,252.012l143.659,207.467l143.445,-207.177c53.811,-71.727 46.022,-189.635 -16.653,-252.302Zm-125.137,190.589c-36.083,0 -65.453,-29.369 -65.453,-65.452c0,-36.084 29.37,-65.453 65.453,-65.453c36.083,0 65.453,29.369 65.453,65.453c0,36.083 -29.37,65.452 -65.453,65.452Z" style="fill-rule:nonzero;"></path>
                        </g>
                    </svg>
                    <a href="https://goo.gl/maps/4ARxyHkPuv32">173 rue de Paris, 53000 Laval</a>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 512 512" version="1.1" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                        <g>
                            <path d="M363.71,0l-215.42,0c-20.617,0 -37.259,16.717 -37.259,37.296l0,437.445c0,20.561 16.642,37.259 37.259,37.259l215.42,0c20.579,0 37.259,-16.698 37.259,-37.259l0,-437.445c0,-20.579 -16.68,-37.296 -37.259,-37.296Zm-160.865,22.65l106.348,0c2.686,0 4.869,4.012 4.869,8.975c0,4.962 -2.183,8.992 -4.869,8.992l-106.348,0c-2.706,0 -4.851,-4.03 -4.851,-8.992c0,-4.963 2.145,-8.975 4.851,-8.975Zm53.174,452.539c-13.117,0 -23.789,-10.672 -23.789,-23.807c0,-13.135 10.672,-23.77 23.789,-23.77c13.079,0 23.751,10.635 23.751,23.77c0,13.135 -10.672,23.807 -23.751,23.807Zm117.038,-81.515l-234.096,0l0,-330.742l234.096,0l0,330.742Z" style="fill-rule:nonzero;"></path>
                        </g>
                    </svg>
                    <a href="tel:+33789477944">07 89 47 79 44</a>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 512 512" version="1.1" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                        <g>
                            <path d="M511.402,97.152c-0.734,-0.865 -1.945,-1.159 -2.978,-0.687c-15.307,6.791 -31.411,11.673 -47.998,14.557c17.609,-13.246 30.729,-31.589 37.457,-52.623c0.325,-1.006 -0.01,-2.108 -0.833,-2.763c-0.829,-0.656 -1.977,-0.74 -2.885,-0.199c-19.832,11.762 -41.311,20.052 -63.87,24.651c-19.99,-20.745 -47.903,-32.612 -76.792,-32.612c-58.753,0 -106.545,47.793 -106.545,106.541c0,7.105 0.686,14.142 2.05,20.975c-81.375,-5.023 -157.464,-44.09 -209.2,-107.547c-0.53,-0.65 -1.332,-1.012 -2.171,-0.928c-0.834,0.063 -1.579,0.535 -1.998,1.253c-9.439,16.193 -14.426,34.72 -14.426,53.567c0,32.664 14.84,63.204 40.11,83.357c-13.01,-1.563 -25.716,-5.658 -37.174,-12.019c-0.77,-0.436 -1.73,-0.43 -2.501,0.015c-0.771,0.441 -1.258,1.259 -1.279,2.15l-0.011,1.364c0,46.912 30.913,88.103 74.894,101.779c-11.584,1.866 -23.603,1.741 -35.418,-0.514c-0.87,-0.163 -1.783,0.136 -2.381,0.807c-0.592,0.672 -0.791,1.61 -0.519,2.46c13.189,41.164 49.833,70.032 92.487,73.629c-35.58,26.068 -77.636,39.801 -122.073,39.801c-8.185,0 -16.429,-0.487 -24.504,-1.436c-1.154,-0.131 -2.297,0.556 -2.696,1.662c-0.398,1.117 0.026,2.365 1.023,2.999c48.086,30.84 103.687,47.133 160.799,47.133c186.814,0 298.446,-151.748 298.446,-298.452c0,-4.085 -0.079,-8.149 -0.242,-12.202c20.153,-14.741 37.452,-32.785 51.401,-53.671c0.624,-0.934 0.556,-2.177 -0.173,-3.047Z" style="fill-rule:nonzero;"></path>
                        </g>
                    </svg>
                    <a href="https://twitter.com/Ay0lyan">@Ayolyan</a>
                </li>
                <li>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="430.117px" height="430.118px" viewBox="0 0 430.117 430.118" style="enable-background:new 0 0 430.117 430.118;"
                         xml:space="preserve">
                        <g>
                            <path id="LinkedIn__x28_alt_x29_" d="M398.355,0H31.782C14.229,0,0.002,13.793,0.002,30.817v368.471
                                c0,17.025,14.232,30.83,31.78,30.83h366.573c17.549,0,31.76-13.814,31.76-30.83V30.817C430.115,13.798,415.904,0,398.355,0z
                                 M130.4,360.038H65.413V165.845H130.4V360.038z M97.913,139.315h-0.437c-21.793,0-35.92-14.904-35.92-33.563
                                c0-19.035,14.542-33.535,36.767-33.535c22.227,0,35.899,14.496,36.331,33.535C134.654,124.415,120.555,139.315,97.913,139.315z
                                 M364.659,360.038h-64.966V256.138c0-26.107-9.413-43.921-32.907-43.921c-17.973,0-28.642,12.018-33.327,23.621
                                c-1.736,4.144-2.166,9.94-2.166,15.728v108.468h-64.954c0,0,0.85-175.979,0-194.192h64.964v27.531
                                c8.624-13.229,24.035-32.1,58.534-32.1c42.76,0,74.822,27.739,74.822,87.414V360.038z M230.883,193.99
                                c0.111-0.182,0.266-0.401,0.42-0.614v0.614H230.883z"/>
                        </g>
                    </svg>
                    <a href="https://www.linkedin.com/in/yoan-bidet-806205174/">Yoan Bidet</a>
                </li>
            </ul>
        </section>
    </div>
</div>