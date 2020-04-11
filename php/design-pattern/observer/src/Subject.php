<?php

namespace Acme;

// can be `trait`
interface Subject
{
    public function attach(Observer $observer);

    public function notify();
}
