<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <div class="text-center">
                <h5>Whale Watching</h5>
              </div>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">WHERE'S WHALES</h1>
            <p class="lead">Add and search for whale sightings off the coast of California.</p>
            <p class="lead">
              <?php echo $this->Html->link('Add Sighting', array('controller' => 'whales', 'action' => 'add'), array('class' => 'btn btn-lg btn-default')); ?>
              <h5><?php echo $this->Html->link('View Sightings', array('controller' => 'whales', 'action' => 'sightings')); ?></h5>
            </p>
          </div>
        </div>
      </div>

</div>