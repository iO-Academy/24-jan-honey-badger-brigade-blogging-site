<?php

require_once 'src/Entities/Blog.php';


use PHPUnit\Framework\TestCase;

class BlogTest extends TestCase
{
    public function test_formatDate()
    {
        $expected = '04/03/24';
        $subject = new Blog(1, 'BlogTitle Test', 'lorem blah blah blah', 3, 'username', '2024-03-04 10:11:03');
        $actual = $subject->postTime;
        $this->assertEquals($actual, $expected);
    }
    public function test_contentExtractLength()
    {
        $expected = 103;
        $subject = new Blog(1, 'BlogTitle Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci. Cras at venenatis mauris. Sed vel ornare neque, varius pellentesque lectus. Donec in dignissim lacus. Suspendisse dictum nunc quis est fermentum faucibus. Nunc ut interdum odio. Mauris porta est sit amet est placerat mattis. In quis tellus at metus sodales mollis. Nam pulvinar sem sed magna consequat euismod. Vestibulum sed ultricies nisi. Proin vitae lectus luctus, pretium elit nec, sagittis justo. Vestibulum non risus arcu. Nunc tempus posuere arcu, vel viverra elit hendrerit eu. Aenean ornare nibh ac felis euismod rutrum nec fermentum leo. Etiam sit amet Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et sollicitudin orci. Morbi eu metus pellentesque, fermentum quam in, vestibulum tellus. Sed dapibus libero eget tincidunt imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ultrices sapien ac metus consectetur, eu dignissim ligula pellentesque. Donec at est nibh. Proin et nibh blandit neque aliquam volutpat quis quis ligula. Proin finibus posuere purus, vitae faucibus justo lobortis in. Maecenas sed suscipit orci. Cras at venenatis mauris. Sed vel ornare neque, varius pellentesque lectus. Donec in dignissim lacus. Suspendisse dictum nunc quis est fermentum faucibus. Nunc ut interdum odio. Mauris porta est sit amet est placerat mattis. In quis tellus at metus sodales mollis. Nam pulvinar sem sed magna consequat euismod. Vestibulum sed ultricies nisi. Proin vitae lectus luctus, pretium elit nec, sagittis justo. Vestibulum non risus arcu. Nunc tempus posuere arcu, vel viverra elit hendrerit eu. Aenean ornare nibh ac felis euismod rutrum nec fermentum leo. Etiam sit amet ', 3, 'username', '2024-03-04 10:11:03');
        $actual = strlen($subject->extract);
        $this->assertEquals($actual, $expected);
    }
}
