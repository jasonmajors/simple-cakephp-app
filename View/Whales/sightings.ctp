<div class="jumbotron">
    <h1>Whale Sightings</h1>
    <h3>Search by Location and/or Species</h3>
</div>

<div class="form-inline">
    <div class="form-group">
    <?php
    echo $this->Form->input('location',
                            array(
                                'options' => $locations,
                                'empty' => '--- All ---',
                                'class' => 'form-control',
                                'id' => 'location')
                            );
    ?>
    </div>
    <div class="form-group">
    <?php
    echo $this->Form->input('species',
                            array(
                                'options' => $species,
                                'empty' => '--- All ---',
                                'class' => 'form-control',
                                'id' => 'species')
                            );
    ?>
    </div>
    <div class="form-group">
    <?php
    echo $this->Form->end(array(
                                'label' => 'Search', 
                                'id' => 'whale-search',
                                'class' => 'btn btn-lg btn-info')
                                ); 
    ?>
</div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Observed</th>
            <th>Species</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody id="whale_table">
        <!-- Will AJAX data into the table from Whales/json_query -->
    </tbody>
</table>