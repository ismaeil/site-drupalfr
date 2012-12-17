<?php

// Load the homepage node and update its content. 
$homepage = node_load(2895);

$homepage->body[LANGUAGE_NONE][0]['value'] = <<<EOF
<p>
Drupal est un logiciel qui permet aux individus comme aux communautés d'utilisateurs de publier facilement, de gérer et d'organiser un vaste éventail de contenus sur un site web. Des dizaines de milliers de personnes et d'organisations utilisent Drupal pour propulser des sites de toutes tailles et fonctions.
</p>
<h3>En savoir plus</h3>
<ul>
<li class="fbl1"><a href="internal:apropos">A propos de Drupal</a></li>
<li class="fbl2"><a href="internal:traduction">La traduction</a></li>
<li class="fbl1"><a href="internal:support">Aide et assistance</a></li>
<li class="fbl2"><a href="internal:communaute">La communauté</a></li>
</ul>
EOF;
$homepage->body[LANGUAGE_NONE][0]['summary'] = '';
$homepage->body[LANGUAGE_NONE][0]['format'] = 1;

node_save($homepage);

// Create the first planet feeds.
$feed_informations = array(
  array(
    'user_id' => 'admin',
    'url' => 'http://drupalfr.org/frontpage/annonces/feed',
  ),
  array(
    'user_id' => 'anavarre',
    'url' => 'http://www.drupalfacile.org/blog.xml',
  ),
  array(
    'user_id' => 'Marc Delnatte',
    'url' => 'http://feeds.feedburner.com/akabia-blog',
  ),
  array(
    'user_id' => 'hellosct1',
    'url' => 'http://blog.hello-design.fr/index.php?feed/category/Drupal/atom',
  ),
  array(
    'user_id' => 'badgones',
    'url' => 'http://helpdrupal.tubaldo.com/rssdrupal.xml',
  ),
  array(
    'user_id' => 'Haza',
    'url' => 'http://blog.haza.fr/taxonomy/term/4/feed',
  ),
  array(
    'user_id' => 'pounard',
    'url' => 'http://blog.processus.org/fr/taxonomy/term/32/feed',
  ),
  array(
    'user_id' => 'Damien Tournoud',
    'url' => 'http://fr.commerceguys.com/blog/articles.xml/fr',
  ),
  array(
    'user_id' => 'GoZ',
    'url' => 'http://blog.fclement.info/taxonomy/term/8/0/feed',
  ),
  array(
    'user_id' => 'JulienD',
    'url' => 'http://juliendubreuil.fr/category/drupal/feed',
  ),
  array(
    'user_id' => 'Artusamak',
    'url' => 'http://juliendubois.fr/category/drupal/feed/',
  ),
  array(
    'user_id' => 'fgm@drupal.org',
    'url' => 'http://www.riff.org/drupal/feed',
  ),
  array(
    'user_id' => 'Yoran',
    'url' => 'http://arnumeral.fr/cat%C3%A9gorie/drupal/feed',
  ),
  array(
    'user_id' => 'j0nathan',
    'url' => 'http://koumbit.org/taxonomy/term/11/0/feed',
  ),
);

foreach ($feed_informations as $feed_information) {
  _migration_create_planet_feed($feed_information);
}

function _migration_create_planet_feed ($feed_information) {
  $user_profile = user_load_by_name($feed_information['user_id']);
  $user_profile->field_planete_rss['und'][0]['url'] = $feed_information['url'];
  user_save($user_profile);
}
