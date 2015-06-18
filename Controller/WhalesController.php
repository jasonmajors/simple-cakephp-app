<?php
class WhalesController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->layout = 'cover';
	}
	
	public function sightings() {
		$this->layout = 'bootstrap';
		// Returns a unique list of locations in a list
		// Couldn't use the 'list' arg with DISTINCT
		$locations = $this->Whale->find('list',
									array(
										'fields' => 'location',
										'group' => 'location',
									)
								);
		$species = $this->Whale->find('list',
									array(
										'fields' => 'species',
										'group' => 'species',
									)
								);
		// Using these arrays to populate the dropdown menus in Whales/sightings.ctp
		$this->set('locations', $locations);
		$this->set('species', $species);
	}

	public function add() {
		$this->layout = 'bootstrap';
		
		if ($this->request->is('post')) {
			$this->Whale->create();
			if ($this->Whale->save($this->request->data)) {
				$this->Session->setFlash(__('Whale sighting added!'));
				return $this->redirect(array('action' => 'sightings'));
			}
			$this->Session->setFlash(__('Unable to add sighting'));
		}
	}

	public function json($category = null, $value = null) {
		if (!$category || !$value) {
			throw new NotFoundException(__('Invalid query'));
		}

		$this->layout = 'ajax';
		// Remove the dash so the value matches how it is stored in the db.
		$value = str_replace('-', ' ', $value);
		if ($category == 'species') {
			$data = $this->Whale->find('all',
							array('conditions' => array('Whale.species LIKE' => "%$value%"))
						);
		}
		if ($category == 'location') {
			$data = $this->Whale->find('all',
							array('conditions' => array('Whale.location LIKE' => "%$value%"))
						);
		}
		if ($category !== 'location' && $category !== 'species') {
			$data = array();
		}
		$this->set('json_data', json_encode($data));
	}
	// Helper function for json_query to check if the HTML val is 'Any' and replace it with
	// an empty string for the query logic
	private function not_any_choice($choice) {
		// Remove the excess spaces
		if (str_replace(' ', '',$choice) == 'All') {
			return false;
		}
		else {
			return $choice;
		}
	}

	public function json_query() {
		$this->layout = 'ajax';

		$location = $this->request->query['location'];
		$species = $this->request->query['species'];
		// Replace the dashes from the URL with spaces to match the DB
		$location = str_replace('-', ' ', $location);
		$species = str_replace('-', ' ', $species);

		$location = $this->not_any_choice($location);
		$species = $this->not_any_choice($species);
		// Passing the order array into the find() methods to have the table
		// ordered by descending dates
		$order = array('Whale.observed DESC');

		if ($location && $species) {
			$data = $this->Whale->find('all',
						array(
							'conditions' => array(
												'Whale.species LIKE' => "%$species%",
												'Whale.location LIKE' => "%$location%",
											),
							'order' => $order,
						)
					);
		}
		elseif ($location) {
			$data = $this->Whale->find('all',
						array(
							'conditions' => array('Whale.location LIKE' => "%$location%"),
							'order' => $order,
						)
					);
		}
		elseif ($species) {
			$data = $this->Whale->find('all',
						array(
							'conditions' => array('Whale.species LIKE' => "%$species%"),
							'order' => $order,
						)
					);
		}
		else {
			$data = $this->Whale->find('all', array('order' => $order));
		}

		$this->set('json_data', json_encode($data));
	}
}