<?php
/**
 * Gabarit commun du module (en-tête + pied + lecteur).
 * Aucune dépendance externe.
 */
declare(strict_types=1);

function page_head(array $o = []): void
{
    $title = $o['title'] ?? 'Qacidates — Les grands poèmes du Chaâbi | Chaabi Music';
    $desc  = $o['desc']  ?? "Parcourez le répertoire des qacidates du chaâbi algérien : texte arabe et traduction française, auteur, interprète.";
    $canon = $o['canonical'] ?? null;
    $og    = $o['og_image'] ?? null;
    $v     = $o['v'] ?? ASSET_V;
    $withFilters = !empty($o['filters']);
    ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" data-theme="chaabi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= h($title) ?></title>
<meta name="description" content="<?= h($desc) ?>">
<meta name="theme-color" content="#f4efe3">
<?php if ($canon): ?><link rel="canonical" href="<?= h($canon) ?>"><?php endif; ?>
<meta property="og:type" content="website">
<meta property="og:title" content="<?= h($title) ?>">
<meta property="og:description" content="<?= h($desc) ?>">
<?php if ($og): ?><meta property="og:image" content="<?= h($og) ?>"><?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>&#128220;</text></svg>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= h(page_url('assets/app.css')) ?>?v=<?= h($v) ?>">
</head>
<body data-api="<?= h(page_url('api')) ?>" data-base="<?= h(page_url()) ?>"<?= !empty($o['ssr']) ? ' data-ssr="1"' : '' ?>>

<a class="skip-link" href="#main">Aller au contenu</a>

<header class="topbar" role="banner">
  <div class="topbar__inner">
    <a class="brand" href="<?= h(page_url()) ?>" aria-label="Accueil — liste des qacidates">
      <img class="brand__logo" src="/music/images/chaabidialna.jpg" alt="" width="34" height="34" loading="eager" decoding="async">
      <span class="brand__text"><strong>Qacidates</strong><small>Radio Chaabi Dialna</small></span>
    </a>

    <nav class="menu" id="menu" aria-label="Navigation principale">
      <a href="<?= h(page_url()) ?>" class="menu__link<?= !empty($o['nav_accueil']) ? ' is-active' : '' ?>">Accueil</a>
      <a href="<?= h(page_url('interpretes')) ?>" class="menu__link<?= !empty($o['nav_interp']) ? ' is-active' : '' ?>">Interprètes</a>
      <a href="<?= h(page_url('auteurs')) ?>" class="menu__link<?= !empty($o['nav_auteur']) ? ' is-active' : '' ?>">Auteurs</a>
      <a href="<?= h(page_url('themes')) ?>" class="menu__link<?= !empty($o['nav_themes']) ? ' is-active' : '' ?>">Thèmes</a>
      <a href="<?= h(page_url('glossaire')) ?>" class="menu__link<?= !empty($o['nav_gloss']) ? ' is-active' : '' ?>">Glossaire</a>
      <a href="<?= h(page_url('hasard')) ?>" class="menu__link">Au hasard</a>
      <a href="<?= h(page_url('apropos')) ?>" class="menu__link<?= !empty($o['nav_apropos']) ? ' is-active' : '' ?>">À propos</a>
    </nav>

    <div class="topbar__tools">
      <form class="search" role="search" autocomplete="off">
        <label class="sr-only" for="q">Rechercher un poème, un auteur, un interprète</label>
        <svg class="search__icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 21l-4.3-4.3M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        <input id="q" name="q" type="search" placeholder="Rechercher…" spellcheck="false" value="<?= h($_GET['q'] ?? '') ?>">
        <button type="button" class="search__clear" hidden aria-label="Effacer la recherche">&times;</button>
      </form>

      <div class="themepick" role="group" aria-label="Ambiance visuelle">
        <button type="button" class="themepick__btn" data-theme-set="chaabi" title="Chaabi (sombre, comme le site)" aria-label="Thème Chaabi"><span class="themepick__dot" data-dot="chaabi" aria-hidden="true"></span><span class="themepick__lbl">Chaabi</span></button>
        <button type="button" class="themepick__btn" data-theme-set="parchemin" title="Parchemin (clair)" aria-label="Thème Parchemin"><span class="themepick__dot" data-dot="parchemin" aria-hidden="true"></span><span class="themepick__lbl">Parchemin</span></button>
        <button type="button" class="themepick__btn" data-theme-set="zellige" title="Zellige (clair froid)" aria-label="Thème Zellige"><span class="themepick__dot" data-dot="zellige" aria-hidden="true"></span><span class="themepick__lbl">Zellige</span></button>
        <button type="button" class="themepick__btn" data-theme-set="nuit" title="Nuit (sombre)" aria-label="Thème Nuit"><span class="themepick__dot" data-dot="nuit" aria-hidden="true"></span><span class="themepick__lbl">Nuit</span></button>
      </div>

      <button type="button" class="iconbtn burger" id="burger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="menu">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/></svg>
      </button>
    </div>
  </div>
<?php if ($withFilters): ?>
  <div class="filters" id="filters" hidden>
    <div class="filters__row" id="chips-interpretes" role="group" aria-label="Filtrer par interprète"></div>
    <div class="filters__row filters__row--secondary">
      <label class="select"><span>Thème</span><select id="sel-theme"><option value="">Tous</option></select></label>
      <label class="select"><span>Trier par</span>
        <select id="sel-sort">
          <option value="recent">Ajout récent</option>
          <option value="titre">Titre (A→Z)</option>
          <option value="vues">Les plus vus</option>
        </select>
      </label>
      <label class="check"><input type="checkbox" id="chk-audio"><span>Uniquement avec audio</span></label>
      <button type="button" class="btn-reset" id="btn-reset" hidden>Réinitialiser</button>
    </div>
  </div>
<?php endif; ?>
</header>

<main id="main" role="main">
<?php
}

function page_foot(array $o = []): void
{
    $v = $o['v'] ?? ASSET_V;
    ?>
</main>

<!-- Pied de page global du site (injecté par assets/footer.js) -->
<div id="footer-root"></div>

<div class="player" id="player" hidden aria-label="Lecteur audio">
  <div class="player__inner">
    <button type="button" class="player__btn player__main" id="pl-toggle" aria-label="Lecture / pause">
      <svg class="player__ico-play" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z" fill="currentColor"/></svg>
      <svg class="player__ico-pause" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 5h4v14H7zM13 5h4v14h-4z" fill="currentColor"/></svg>
    </button>
    <button type="button" class="player__btn player__step" id="pl-prev" aria-label="Piste précédente"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 6v12M18 6l-8 6 8 6z" fill="currentColor"/></svg></button>
    <button type="button" class="player__btn player__step" id="pl-next" aria-label="Piste suivante"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 6v12M6 6l8 6-8 6z" fill="currentColor"/></svg></button>
    <div class="player__meta"><strong id="pl-title">—</strong><small id="pl-sub"></small></div>
    <div class="player__progress">
      <span class="player__time" id="pl-cur">0:00</span>
      <input type="range" id="pl-seek" min="0" max="1000" value="0" step="1" aria-label="Position de lecture">
      <span class="player__time" id="pl-dur">0:00</span>
    </div>
    <div class="player__vol">
      <button type="button" class="player__btn" id="pl-mute" aria-label="Couper le son">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 9v6h3l5 4V5L7 9H4z" fill="currentColor"/><path class="player__wave" d="M15.5 8.5a5 5 0 0 1 0 7M18 6a8.5 8.5 0 0 1 0 12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
      </button>
      <input type="range" id="pl-vol" min="0" max="100" value="85" aria-label="Volume">
    </div>
    <button type="button" class="player__btn player__close" id="pl-close" aria-label="Fermer le lecteur"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/></svg></button>
  </div>
  <audio id="pl-audio" preload="none"></audio>
</div>

<template id="tpl-card">
  <a class="card" href="#" role="link">
    <div class="card__head">
      <span class="card__medal">
        <img alt="" loading="lazy" decoding="async">
        <span class="card__medal-fallback" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 15a3 3 0 0 0 3-3V6a3 3 0 0 0-6 0v6a3 3 0 0 0 3 3zm5-3a5 5 0 0 1-10 0H5a7 7 0 0 0 6 6.92V21h2v-2.08A7 7 0 0 0 19 12h-2z" fill="currentColor"/></svg></span>
      </span>
      <div class="card__id">
        <h2 class="card__title"></h2>
        <p class="card__sub"></p>
      </div>
      <span class="card__audio" hidden title="Audio disponible" aria-label="Audio disponible"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z" fill="currentColor"/></svg></span>
    </div>
    <p class="card__ar" dir="rtl" lang="ar"></p>
    <p class="card__author"></p>
    <ul class="card__meta"></ul>
  </a>
</template>

<script src="<?= h(page_url('assets/app.js')) ?>?v=<?= h($v) ?>" defer></script>
</body>
</html>
<?php
}
