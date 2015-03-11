<?php

class page_content
{

  public $html;
  public $post;

  public function __construct($id)
  {
    $this->post = get_post($id);
//    $this->build_title();
    $this->switchboard();
  }

  public function build_title()
  {
    $this->html .= "<h1>{$this->post->post_title}</h1>";
    $this->html12 .= "<h1>{$this->post->post_title}</h1>";
    $this->html .= "<h1>{$this->post->post_title}</h1>";
    $this->html .= "<h1>{$this->post->post_title}</h1>";
    $this->html .= "<h1>{$this->post->post_title}</h1>";
  }

  public function switchboard()
  {
    switch ($this->post->ID):
      case 8:
        $this->html .= $this->get_template('/static/company.php');
        break;
      case 10:
        $this->html .= $this->get_template('/static/services.php');
        break;
      case 12:
        $this->html .= $this->get_template('/template/portfolio.php');
        break;
      case 14:
//        $this->html .= $this->get_template('/static/clients.php');
        $this->build_clients_list();
        break;
      case 18:
        $this->html .= $this->get_template('/static/contact.php');
        break;
      case 20:
        $this->html .= $this->get_template('/static/philosophy.php');
        break;
      case 22:
        $this->html .= $this->get_template('/static/history.php');
        break;
      case 24:
        $this->html .= $this->get_template('/static/team.php');
        break;
      default:
        $this->html .= "<p>Current Page ID: {$this->post->ID}</p>";
        break;
    endswitch;
  }

  private function get_template($file)
  {

    ob_start(); // start output buffer
    $file = get_template_directory() . $file;
    include $file;
    $template = ob_get_contents(); // get contents of buffer
    ob_end_clean();
    return $template;

  }

  public function print_html()
  {
    print $this->html;
  }

  public function get_html()
  {
    return $this->html;
  }

  public function build_clients_list()
  {
    $this->html .= "
<span class='clients'>
	<h2 class='page-title'><strong>TSD </strong>Select Client List</h2>
	<p class='intro'>Over the years, we’ve worked with more than 2,000 clients on projects ranging from branding to print
  design, to web design/development. Here’s a representative sample of our experience in a few industries.</p>

	<h5>Where Do You Fit In?</h5>
	<p>Since 2004, Top Shelf Design has served a diverse range of clients, including lobbyists, restaurants, and even
    funeral homes. As a byproduct of our geographical location, we’ve collaborated with many non-profits, associations,
    and trade organizations from multiple industries. In short, we don’t have a niche market—and we’re proud of it!
We’ve listed a sampling of our clients, along with case studies that are an in-depth showcase of the work we’ve
    developed for a few of our clients. We encourage you to review these to gain a better understanding of how we can
    enhance your business.
  </p>
	<ul class='small-block-grid-1 medium-block-grid-3 large-block-grid-4'>";
    $client_groups = get_field("select_client_list");

    foreach ($client_groups as $group):

      $this->html .= "<li><h3 class='underline text-center'>{$group['category']}</h3><ul>";
      foreach ($group['clients'] as $client):
        if ($client['client_website_url']):
          $_title = "<a href='{$client['client_website_url']}' target='_blank' class='external-link' />{$client['client_name']}</a>";
        else:
          $_title = $client['client_name'];
        endif;
        $this->html .= "<li>$_title</li>";
      endforeach;
      $this->html .= "</ul></li>";
    endforeach;

    $this->html .= "
      </ul><!-- End of grid container -->
      </span>
    ";
  }


}
