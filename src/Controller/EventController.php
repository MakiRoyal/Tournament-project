<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\EventModel;
use Twig\Environment;

class EventController extends Controller
{
    private EventModel $eventModel;

    public function __construct() {
        parent::__construct();
        $this->eventModel = new EventModel();
    }

    public function ListEvent() {
        $events = $this->eventModel->EventList();
        echo $this->twig->render('event.html.twig', ['events' => $events]);
    }

}