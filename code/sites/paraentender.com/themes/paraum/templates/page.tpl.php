<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="container">
    <div class="navbar-header">
      <?php if ($logo): ?>
      <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
      <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($secondary_nav)): ?>
            <?php print render($secondary_nav); ?>
          <?php endif; ?>
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</header>

<div class="main-container container">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="row">

<h1>Seja bem-vindo ao Para Entender a Internet, um livro vivo que se atualiza e do qual você pode participar como autor.</h1>
<h2>Conheça a história e o conceito deste projeto.</h2>

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section<?php print $content_column_class; ?>>
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
  
  <?php if ($is_front == TRUE) { ?>
  <!-- ASPAS -->
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <style class="cp-pen-styles">/* carousel */
  #quote-carousel 
  {
    padding: 0 10px 30px 10px;
    margin-top: 30px 0px 0px;
  }

  /* Control buttons  */
  #quote-carousel .carousel-control
  {
    background: none;
    color: #222;
    font-size: 2.3em;
    text-shadow: none;
    margin-top: 30px;
  }
  /* Previous button  */
  #quote-carousel .carousel-control.left 
  {
    left: -12px;
  }
  /* Next button  */
  #quote-carousel .carousel-control.right 
  {
    right: -12px !important;
  }
  /* Changes the position of the indicators */
  #quote-carousel .carousel-indicators 
  {
    right: 50%;
    top: auto;
    bottom: 0px;
    margin-right: -19px;
  }
  /* Changes the color of the indicators */
  #quote-carousel .carousel-indicators li 
  {
    background: #c0c0c0;
  }
  #quote-carousel .carousel-indicators .active 
  {
    background: #333333;
  }
  #quote-carousel img
  {
    width: 250px;
    height: 100px
  }
  /* End carousel */

  .item blockquote {
      border-left: none; 
      margin: 0;
  }

  .item blockquote img {
      margin-bottom: 10px;
  }

  .item blockquote p:before {
      content: "\f10d";
      font-family: 'Fontawesome';
      float: left;
      margin-right: 10px;
  }



  /**
    MEDIA QUERIES
  */

  /* Small devices (tablets, 768px and up) */
  @media (min-width: 768px) { 
      #quote-carousel 
      {
        margin-bottom: 0;
        padding: 0 40px 30px 40px;
        margin-top: 30px;
      }
    
  }

  /* Small devices (tablets, up to 768px) */
  @media (max-width: 768px) { 
    
      /* Make the indicators larger for easier clicking with fingers/thumb on mobile */
    
      #quote-carousel .carousel-indicators {
          bottom: -20px !important;  
      }
      #quote-carousel .carousel-indicators li {
          display: inline-block;
          margin: 0px 5px;
          width: 15px;
          height: 15px;
      }
      #quote-carousel .carousel-indicators li.active {
          margin: 0px 5px;
          width: 20px;
          height: 20px;
      }
  }</style>
  <div class="container">
    <div class="row">
      <div class='col-md-offset-2 col-md-8 text-center'>
      <!-- <h2>Aspas</h2> -->
      </div>
    </div>
    <div class='row'>
      <div class='col-md-offset-2 col-md-8'>
        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
          <!-- Bottom Carousel Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#quote-carousel" data-slide-to="1"></li>
            <li data-target="#quote-carousel" data-slide-to="2"></li>
            <li data-target="#quote-carousel" data-slide-to="3"></li>
            <li data-target="#quote-carousel" data-slide-to="4"></li>
            <li data-target="#quote-carousel" data-slide-to="5"></li>
            <li data-target="#quote-carousel" data-slide-to="6"></li>
            <li data-target="#quote-carousel" data-slide-to="7"></li>
            <li data-target="#quote-carousel" data-slide-to="8"></li>
            <li data-target="#quote-carousel" data-slide-to="9"></li>
            <li data-target="#quote-carousel" data-slide-to="10"></li>
          </ol>
        
          <!-- Carousel Slides / Quotes -->
          <div class="carousel-inner">
        
            <!-- Quote 1 -->
            <div class="item active">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/acquarone.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>O projeto me lembra a coleção Primeiros Passos, que tratava de assuntos mundanos e complexos, mas que sempre disfarçava a complexidade do assunto em edições pequenas, de bolso, quase inofensivas. Quando o objetivo é 'Entender a Internet', o ideal é que seja feito como esta coleção, com textos pequenos escritos por alguns dos maiores especialistas do mercado brasileiro, mas acima de tudo fáceis de ler. Ao final, dá pra entender a Internet? Lógico, exceto que ela continua mudando. E a gente também, como tudo. Mas a vontade de entender permanece com o leitor.</p>
                    <small>Eduardo Acquarone, editor executivo de mídias digitais da TV Globo e bolsista do Tow Knight Center em Nova York</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/souza.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>O Para Entender a Internet traz uma visão privilegiada de como a tecnologia e a comunicação se organizaram em rede, o livro é escrito por diversas pessoas que experimentaram esses conceitos na prática, muitas vezes antes deles se tornarem padrões de mercado e em alguns casos os autores aqui presentes ajudaram na própria criação ou consolidação desse conceito. É uma visão de dentro sem exageros ou tecnicismos, o livro é escrito numa linguagem acessível para quem quer se familiarizar com as tecnologias a serviços da comunicação do mundo atual e se libertar dos conceitos ultrapassados do século XX.</p>
                    <small>Edney Souza, Professor da ESPM e FGV e Consultor independente</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/ziggy.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>O Para Entender a Internet foi uma iniciativa importante para fomentar a inclusão digital no Brasil. Ver o projeto ganhar as prateleiras é um misto de orgulho com sentimento de dever cumprido.</p>
                    <small>Rafael Ziggy, Estrategista Digital da Agência Africa</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/estigarribia.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>O Para Entender traz textos fáceis de ler e que agradam desde novatos até quem já trabalha na área, pois são tantos os temas abordados que sempre tem alguma novidade até pros experts. Agora que o projeto virtual chega ao papel cabe a todos nós fazemos o que já fazemos online, não deixar o livro parado numa estante e circulá-lo entre amigos, parentes e desconhecidos.</p>
                    <small>Carlos Estigarribia, sócio da RightZero e fundador da ABRAGAMES e da NearBytes</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/lima.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>O Para Entender a Internet nunca foi tão atual. Os temas exigem um olhar e reflexão ainda mais cuidadoso por parte dos consumidores e das empresas. E continuarão sendo uma preocupação constante das próximas gerações que trabalham com Comunicação Digital.</p>
                    <small>Alessandro Lima, CEO da E.life</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/franco.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>Seis anos se passaram do lançamento original do 'Para Entender...' e eis o livro aqui: não só ainda pertinente, mas também crescido e fortalecido. Isso é uma boa medida do quanto os artigos conseguiram de fato tocar no cerne dos seus temas e do quanto os organizadores foram bem sucedidos na seleção do que deveria ser abordado, mas é sobretudo uma amostra de que o livro é, em si mesmo, um exemplo de uma prática de produção cultural típica da internet.</p>
                    <small>Diego Franco, pesquisador e professor da Universidade Metodista de SP</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/tolda.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>Entender a Internet é um BHAG como diz Jim Collins em Built to Last, um Big Hairy Audicious Goal, um objetivo enorme, audacioso e cabeludo! E assim, os desorganizadores dessa empreitada reuniram pessoas dos mais diferentes campos de atuação. Acadêmicos, ativistas políticos, profissionais, executivos, todos trabalhando em conjunto contribuindo e colaborando para esse enorme objetivo. Espero que gostem do livro e que entendam que sozinhos nenhum de nós entende a Internet.</p>
                    <small>Stelleo Tolda, COO do MercadoLivre</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/guarnieri.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>Para alguns a Internet parece uma coisa óbvia. Para os mais jovens, que já nasceram conectados na Web, isso é ainda mais verdadeiro. O que este livro mostra é que não é bem assim. Essa rede de computadores espalhados pelo mundo utilizou, na sua formação, e mobilizou, no seu desenvolvimento, uma série de conceitos, ideias e comportamentos que a transformaram em uma instituição, no sentido sociológico do termo. A Internet enquanto instituição não é uma coisa óbvia e esse livron os ajuda a entende-la de modo diferente e melhor.</p>
                    <small>Fernando Guarnieri é professor de Ciência Política do IESP/UERJ</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/fernandes.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>Em tempos de ubiquidade total de dispositivos, onde as telas ultrapassaram o status de interface para se fundir aos seres humanos numa simbiose de dados e emoções, Para Entender a Internet ainda é o melhor manual de instruções para novatos e veteranos no ambiente digital. Tudo o que você precisa saber para navegar com segurança na web está nesse guia. Mergulhe sem medo.</p>
                    <small>Fábio Fernandes, escritor, tradutor, pesquisador e professor da PUC-SP</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 2 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/abdo.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>A riqueza dos textos no 'Para Entender', e seu processo participativo de produção, tanto revelam uma necessidade de perdermos a visão ingênua de que compreendemos a Internet somente a partir do nosso uso, popularizada no mito dos 'nativos digitais', como demonstram a capacidade de adaptação dessa sociedade em rede, abrindo caminhos para juntos aprofundarmos nosso pensamento!</p>
                    <small>Ale Abdo, membro do Garoa Hacker Clube</small>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- Quote 3 -->
            <div class="item">
              <blockquote>
                <div class="row">
                  <div class="col-sm-3 text-center">
                    <img class="img-circle" src="/sites/paraentender.com/static/img/quotes/lemos.jpg" style="width: 100px; height:100px;">
                  </div>
                  <div class="col-sm-9">
                    <p>Não existe dúvida de que a computação e a Internet são as forças transformadores mais fortes que a humanidade conheceu nas últimas quatro décadas e que, provavelmente, continuarão assim pelas próximas quatro. Entender os conceitos e dinâmicas que fazem da Internet este motor de transformação e suas principais conseqüências e implicações para o indivíduo, a sociedade e os negócios é fundamental para vivermos melhor neste mundo conectado. Este livro foi construído sobre os fundamentos da rede e é um guia para nós, os usuários.</p>
                    <small>Manoel Lemos, sócio da Redpoint e.Ventures e fundador do Fazedores.com</small>
                  </div>
                </div>
              </blockquote>
            </div>
          </div>
        
          <!-- Carousel Buttons Next/Prev -->
          <!-- <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
          <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a> -->
        </div>                          
      </div>
    </div>

  </div>
  <!-- ASPAS -->
  <?php } ?>
  
</div>

<footer class="footer">
	<div class="container">
	  <?php // print render($page['footer']); ?>

		<div class="row">
		  <div class="col-md-2">
				<section id="links-projeto">
					<h2>sobre</h2>
					<?php
					$menu_sobre = menu_navigation_links('menu-sobre');
					print theme('links__system_main_menu', array('links' => $menu_sobre));
					?>
				</section>
			</div>
		  <div class="col-md-2">
				<section id="links-projeto">
					<h2>autores</h2>
					<?php
					$menu_autores = menu_navigation_links('menu-autores');
					print theme('links__system_main_menu', array('links' => $menu_autores));
					?>
				</section>
		  </div>
		  <div class="col-md-3">
				<section id="links-projeto">
					<h2>editores</h2>
					<?php
					$menu_editores = menu_navigation_links('menu-editores');
					print theme('links__system_main_menu', array('links' => $menu_editores));
					?>
				</section>
		  </div>
		  <div class="col-md-5"><!-- MailChimp -->
		<section id="mailchimp">
			<h2>Newsletter</h2>
			<p>Não perca as novidades do Para Entender. Inscreva-se na nossa newsletter!</p>
			<form action="//paraentender.us8.list-manage.com/subscribe/post?u=9b58e8756ed5af01aee94eef4&amp;id=d3a30bd781" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="form-inline">
				<div class="form-group">
					<label for="mce-EMAIL" class="sr-only">Email Address</label>
					<input type="email" placeholder="Digite seu email" value="" name="EMAIL" class="form-control mailchimp-email" id="mce-EMAIL">
				</div>
				<input type="submit" value="OK" name="subscribe" id="mc-embedded-subscribe" class="btn mailchimp-ok">
			</form>
			</div>
		</section>
		<!-- / MailChimp --></div>
		</div>
	</div>
</footer>

<?php if ($page['credits']) : ?>
<div class="credits">
  <?php // print render($page['credits']); ?>
	<div class="container">
		<div class="row">
		  <div class="col-md-11"></div>
		  <div class="col-md-1"><a href="http://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt_BR"><img src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a></div>
		</div>
	</div>
</div> <!-- /#credits -->
<?php endif; ?>


<script>
$(document).ready(function () {
    $('#quote-carousel').carousel({
        pauseOnHover: true,
        interval: 300
    });
});
//@ sourceURL=pen.js
</script>