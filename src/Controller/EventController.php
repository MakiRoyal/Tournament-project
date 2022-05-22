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

    public function EventList() {
        $events = $this->eventModel->EventList();
        echo $this->twig->render('createEvent.html.twig', ['events' => $events]);
    }



    public function createEvent()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $from = $_FILES['image']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image']['name'];
            if (move_uploaded_file($from, $to))
            {
                $this->eventModel->createEvent($_POST['nom'], $_FILES['image']['name'], $_POST['description'], $_POST['date'], $_POST['place']);
            }
            var_dump($_POST);
            header('location: /createEvent');
            exit();
        }
        echo $this->twig->render('createEvent.html.twig');
    }



    public function deleteEvent(){
        if(isset($_POST)){
            $this->eventModel->deleteEvent(key($_POST));
            header('location: /createEvent');
            exit();
        }
    }


}