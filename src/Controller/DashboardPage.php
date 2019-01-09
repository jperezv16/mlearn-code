<?php

namespace App\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Slim\Views\Twig;
use \App\Lib\Data;

class DashboardPage extends Page
{
    public function notes(Request $request, Response $response, array $args) 
    {
        $page = $this->init();

        $page['notes'] = $this->loadUserNotes();

        return $this->view->render($response, 'dashboard.twig', $page);
    }

    public function deleteNote(Request $request, Response $response, array $args) 
    {
        $notes = $this->data->get('notes');

        $id = isset($args['id']) ? (int)$args['id'] : 0;

        foreach ($notes as $i => $note) {
            if ($note['userId'] == $this->user->getId() && $note['id'] == $id) {
                unset($notes[$i]);
            }
        }

        $this->data->save('notes', $notes);

        $data = ['success' => true];

        return $response->withJson($data, 200);
    }

    public function addNote(Request $request, Response $response, array $args) 
    {
        $notes = $this->data->get('notes');

        $lastId = 0;

        foreach ($notes as $note) {
            if ($note['id'] > $lastId) {
                $lastId = $note['id'];
            }
        }

        $note = [
            'id' => $lastId + 1,
            'userId' => $this->user->getId(),
            'text' =>  $request->getParam('text', ''),
            'date' => date("Y-m-d H:i:s")
        ];

        $notes[] = $note;

        $this->data->save('notes', $notes);

        return $response->withJson($note, 200);
    }

    private function loadUserNotes()
    {
    	$notes = $this->data->get('notes');

    	$userNotes = [];

    	foreach ($notes as $note) {
    		if ($note['userId'] == $this->user->getId()) {
    			$userNotes[] = $note;
    		}
    	}

    	return $userNotes;
    }
}
