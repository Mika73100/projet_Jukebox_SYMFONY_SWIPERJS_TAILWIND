
# 🎵 Jukebox – Symfony + SwiperJS + TailwindCSS

Ce projet est un **jukebox web interactif** développé avec **Symfony** pour le backend, **SwiperJS** pour l’expérience utilisateur dynamique (carrousels), et **Tailwind CSS** pour un design responsive et moderne.

## 🔧 Stack technique

- **Symfony** – Framework backend PHP robuste
- **SwiperJS** – Carrousels et navigation fluide
- **TailwindCSS** – Framework CSS utilitaire
- **MySQL** – Base de données relationnelle
- **Docker** – Déploiement et environnement local
- **Twig** – Moteur de templates

## ✨ Fonctionnalités

- Affichage de playlists ou morceaux en carrousel
- Intégration fluide des interfaces frontend via Swiper
- Backend Symfony pour la gestion des pistes
- Base de données exportable (`symfonyjukebox.sql`)
- Design responsive avec Tailwind

## ⚙️ Installation

### Prérequis

- Docker + Docker Compose
- Composer
- Node.js (si recompilation de Tailwind)

### Étapes

```bash
cd my_project_name
cp .env .env.local
composer install
docker compose up -d
```

### Créer la base et charger les données

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

## 💿 Interface utilisateur

L’interface utilise **SwiperJS** pour l'affichage :

- Carrousels animés de playlists/morceaux
- Navigation tactile optimisée
- Affichage dynamique côté client

## 📁 Structure du projet

```
my_project_name/
├── config/               # Configuration Symfony
├── src/                  # Contrôleurs et entités
├── templates/            # Fichiers Twig
├── public/               # Fichiers JS, CSS, assets Swiper/Tailwind
```

## 🧪 Tests

```bash
php bin/phpunit
```

## 🙌 Remerciements

Merci d’avoir jeté un œil à ce projet !  

<div align="center">
⭐ N’hésite pas à forker, améliorer ou t’en inspirer ! ⭐  
Bon code à toi 🚀

⭐ Un petit like sur le repo fait toujours plaisir ! ⭐  
</div>
