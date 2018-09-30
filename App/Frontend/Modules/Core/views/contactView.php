<div class="contentSection">
    <div class="contentSectionLeft">
        <nav class="leftNav">
            <?= $leftNav ?>
        </nav>
        <img src="images/contact.jpg" />
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
                    <label for="name">Prénom <span>*</span></label>
                    <input type="text" name="name" id="name" placeholder="Votre prénom" required/>
                </div>
                <div>
                    <label>E-mail <span>*</span></label>
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
            <ul>
                <li>
                    173 rue de Paris, 53000 Laval
                </li>
                <li>
                    07 89 47 79 44
                </li>
                <li>
                    @Ayolyan
                </li>
            </ul>
        </section>
    </div>
</div>