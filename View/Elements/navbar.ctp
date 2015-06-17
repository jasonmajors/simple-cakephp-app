<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand" href='#'>Where's Whales</span>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo $this->Html->link('Home', array('controller' => 'whales', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link('Sightings', array('controller' => 'whales', 'action' => 'sightings')); ?></li>
        <li><?php echo $this->Html->link('Add', array('controller' => 'whales', 'action' => 'add')); ?></li>
      </ul>
    </div>
  </div>
</nav>