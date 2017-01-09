<?php
/**
 * Created by PhpStorm.
 * User: Karginsky
 * Date: 08.01.2017
 * Time: 17:52
 */

class HTMLRenderer
{
    private $topperLink = "scripts/pages/topper.php";
    private $footerLink = "scripts/pages/footer.php";
    private $hostName = "http://localhost";
    private $linkNames = array("about", "home", "webinars");

    /**
     * Public method for rendering all the Content;
     * @param $link - param from $_GET
     * @return string;
     */
    public function render($link) {
        try {
            ob_start();
            $this->renderTop();
            $this->renderContent($link);
            $this->renderFooter();
            return ob_get_clean();
        } catch (ErrorException $e) {
            return "Problem with site rendering! We are working on it!";
        }
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * Function for rendering top of the HTML Document
     * @throws ErrorException
     */
    private function renderTop() {
        if (file_exists($this->topperLink)) {
            include "$this->topperLink";
        } else {
            throw new ErrorException();
        }
    }

    /**
     *  Function for rendering center-content of the HTML Document
     *  @param $link - param with String-name from GET-array;
     */
    private function renderContent($link) {
        if (in_array($link, $this->linkNames)) {
            include "pages/" . $link . ".php";
        } else {
            include "pages/home.php";
        }
    }

    /**
     *  Function for rendering footer of the HTML Document
     */
    private function renderFooter() {
        if (file_exists($this->footerLink)) {
            include "$this->footerLink";
        } else {
            throw new ErrorException();
        }
    }



}