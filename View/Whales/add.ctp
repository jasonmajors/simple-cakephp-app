<?php
$species = array('Blue' => 'Blue',
                'Gray' => 'Gray',
                'Balooga' => 'Balooga',
                'Humpback' => 'Humpback',
                'Orca' => 'Orca',
                'Narwhal' => 'Narwhal',
                'Sperm' => 'Sperm',
                'Pygmy Sperm' => 'Pygmy Sperm',
                'Melon Headed' => 'Melon-Headed',
                'Spotted Dolphin' => 'Spotted Dolphin',
                'Bottlenose Dolphin' => 'Bottlenose Dolphin',

                );

$locations = array('San Francisco' => 'San Francisco',
                    'San Diego' => 'San Diego',
                    'Long Beach' => 'Long Beach',
                    'Newport Beach' => 'Newport Beach',
                    'San Clemente' => 'San Clemente',
                    'Malibu' => 'Malibu',
                    'Santa Barbara' => 'Santa Barbara',
                    'Santa Cruz' => 'Santa Cruz',
                
                    );
;?>
<div class="jumbotron">
<h1>Add Sighting</h1>
<h3>Select the species, location, and time of a sighting</h3>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php
        echo $this->Form->create('Whale', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
        <?php
        echo $this->Form->input('species',
                            array('options' => $species,
                                'empty' => '-- Select Species --',
                                'class' => 'form-control',
                                )
                        );
        ?>
        </div>
        <div class="form-group">
        <?php
        echo $this->Form->input('location',
                            array('options' => $locations,
                                'empty' => '-- Select Nearest Location --',
                                'class' => 'form-control',
                                )
                        );
        ?>
        </div>

        <label class="form-group">Observed</label>

        <div class="form-inline">
            <div class="form-group">
            <?php echo $this->Form->input('observed',
                                array('class' => 'form-control',
                                    'label' => '')
                            ); 
            ?>
            </div>
        </div>
        <div class="form-group text-center">
        <?php echo $this->Form->end(array('label' => 'Submit Sighting',
                                        'class' => 'btn btn-lg btn-info',
                                        'id' => 'add-btn-submit'
                                        )
                                    ); 
        ?>
        </div>
    </div>
</div>