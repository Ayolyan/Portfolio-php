<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 13/08/2018
 * Time: 00:54
 */

namespace AyolyanFram;


class Page extends ApplicationComponent {

    protected $contentFile;
    protected $vars = [];

    public function addVar($var, $value) {
        if (!is_string($var) || is_numeric($var) || empty($var)) {
            throw new \InvalidArgumentException('Le nom de la variable doit être une chaine de caractères non nulle');
        }

        $this->vars[$var] = $value;
    }

    public function getGeneratedPage() {
        if (!file_exists($this->contentFile)) {
            throw new \RuntimeException('La vue spécifiée ('.$this->contentFile.') n\'existe pas.');
        }

        $user = $this->app->getUser();

        extract($this->vars);

        ob_start();
            require $this->contentFile;
        $content = ob_get_clean();

        ob_start();
            require __DIR__ . '/../../App/' . $this->app->getName() . '/Templates/default.php';
        return ob_get_clean();
    }

    /**
     * @param mixed $contentFile
     */
    public function setContentFile($contentFile) {
        if (!is_string($contentFile) || empty($contentFile)) {
            throw new \InvalidArgumentException('La vue spécifiée est invalide.');
        }

        $this->contentFile = $contentFile;
    }

}