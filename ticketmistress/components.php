<?php
function navbar()
{

    echo (
        '<header class="header-area">
        <div class="navbar-area">
          <div class="container">
            <nav class="site-navbar">
              <a href="/" class="site-logo">TicketMistress</a>
      
              <ul>
                <li><a href="/">home</a></li>
                <li><a href="/about">about</a></li>
                <li><a href="/download">download</a></li>
                <li><a href="/contacts">contact</a></li>
              </ul>
            </nav>
          </div>
        </div>
        </header>'
    );
}
function card($id, $title, $organizer, $content)
{
    echo (
      '<div class="card">
                <div class="card-header">
                    <h2>'.$title.'</h2>
                    <h6>by '.$organizer.'</h6>
                </div>
                <div class="card-content">
                <h3>'.$content.'</h3>
                </div>
                <button class="btn-primary">
                  <a href="program.php?id='.$id.'">
                  I\'ll check it out
                  </a>
                </button>
        </div>');
}
function quantity($onIncrease, $onDecrease, $ticket_type){
  echo '
  <div class="number-spinner">
  <button type="button" onclick="'.$onDecrease.'('.$ticket_type.')" class="btn quantity-spinner down"> 
  <span class="sr-only"><i data-feather="minus"></i></span>
  </button>
  <input name="'.$ticket_type.'" type="text" id="'.$ticket_type.'" class="text-center sel-qty" data-sectionid="349822"
      data-tickettypeid="844157" data-eventhubid="165023"
      data-quantityarray="[1,2,3,4,5,6,7,8]" value="0" disabled=""
      aria-label="Select Quantity" aria-live="polite">
  <button onclick="'.$onIncrease.'('.$ticket_type.')" type="button" class="btn quantity-spinner up"><span class="sr-only"><i data-feather="plus"></i></span></button>
  </div>';
};