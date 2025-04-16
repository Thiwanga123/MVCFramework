<?php

class GuideController {
    public function listGuides() {
        echo 'GuideController listGuides method called.';
    }

    public function dashboard() {
        echo 'GuideController dashboard method called.';
    }

    public function tourGuidesDashboard() {
        session_start();
        if (isset($_SESSION['id']) && $_SESSION['id'] == 5) {
            echo 'Welcome to the Tour Guides Dashboard';
        } else {
            echo 'Access Denied: Invalid Session';
        }
    }
}
?>
