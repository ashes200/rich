<?php
class SessionManager {

    private static $instance;

    private function __construct() {}

    final public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new SessionManager();
        }
        return self::$instance;
    }

    // Méthode pour démarrer la session
    public function startSession() {
        if (session_status() === 1) {
            session_start();
        }
    }

    // Méthode pour vérifier si la session est démarrée
    public function isSessionStarted() {
        return session_status();
    }

    // Méthode pour définir une variable de session
    public function setSessionVariable($key, $value) {
        if (!$this->isSessionStarted()) {
            $this->startSession();
        }
        $_SESSION[$key] = $value;
    }

    // Méthode pour récupérer la valeur d'une variable de session
    public function getSessionVariable($key) {
        if (!$this->isSessionStarted()) {
            $this->startSession();
        }
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    // Méthode pour détruire la session
    public function destroySession() {
        $this->startSession();
        session_destroy();
    }
}

