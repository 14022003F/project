<?php
// tests/LoginTest.php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
 
    public function testInvalidLogin() {
        // Simulate form submission with invalid credentials
        $_POST['cin'] = 'invalid_cin';
        $_POST['password'] = 'invalid_password';
        
        // Include login script file
        ob_start(); // Start output buffering to capture any echoed output
        include('login.php');
        $output = ob_get_clean(); // Capture the output
        
        // Assert error message is displayed
        $this->assertContains('Please verify your informations.', $output);
    }
    
    // Add more test cases for other scenarios
}
?>
