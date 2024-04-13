<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
    public function testValidLogin() {
        // Mock database connection
        $conMock = $this->getMockBuilder('mysqli')
                        ->disableOriginalConstructor()
                        ->getMock();
        
        // Set up expectations for database query
        $conMock->expects($this->once())
                ->method('query')
                ->with("SELECT * FROM patient WHERE cin='valid_cin' AND password='valid_password'")
                ->willReturn($this->returnValue(true)); // Assuming valid login
        
        // Simulate form submission with valid credentials
        $_POST['cin'] = 'valid_cin';
        $_POST['password'] = 'valid_password';

        // Call the login function or method
        $result = login($conMock);

        // Assert session variables are set correctly
        $this->assertEquals('valid_cin', $_SESSION['valid']);
        // Add assertions for other session variables if needed
    }
    
    public function testInvalidLogin() {
        // Mock database connection
        $conMock = $this->getMockBuilder('mysqli')
                        ->disableOriginalConstructor()
                        ->getMock();
        
        // Set up expectations for database query
        $conMock->expects($this->once())
                ->method('query')
                ->with("SELECT * FROM patient WHERE cin='invalid_cin' AND password='invalid_password'")
                ->willReturn($this->returnValue(false)); // Assuming invalid login
        
        // Simulate form submission with invalid credentials
        $_POST['cin'] = 'invalid_cin';
        $_POST['password'] = 'invalid_password';

        // Call the login function or method
        $result = login($conMock);
        
        // Assert error message is displayed
        // Since the error message is echoed directly in the script, you may need to capture it using output buffering
        ob_start();
        $this->assertFalse($result); // Assuming the login function returns false for invalid login
        $output = ob_get_clean();
        $this->assertContains('Please verify your informations.', $output);
    }
    
    // Add more test cases for other scenarios
}
?>
