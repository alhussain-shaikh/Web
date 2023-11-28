<?php if (isset($this->message)) {
    echo "
    <div class='alert alert-{$this->messageType} text-center mt-2' role='alert'>
        {$this->message}
    </div>
    ";
}
