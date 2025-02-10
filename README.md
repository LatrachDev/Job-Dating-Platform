# 🚀 **Job Dating Management Platform**

## 🎯 **Contexte du Projet**

YouCode, en tant qu'établissement d'apprentissage dynamique, organise fréquemment des événements de Job Dating pour favoriser la rencontre entre les apprenants et les employeurs potentiels. Afin de faciliter la gestion et la diffusion des annonces liées à ces événements, l'équipe de YouCode souhaite mettre en place une application web dédiée.

---

## 🎯 **Objectif**

Le principal objectif de ce projet est de concevoir et de développer une application web permettant aux administrateurs de YouCode de gérer efficacement les annonces de Job Dating. Cette application doit offrir une interface pour la création, l'édition et la suppression des annonces, tout en permettant aux apprenants d'accéder facilement aux informations pertinentes.

---

## 🔑 **Fonctionnalités Clés**

- 📢 **Gestion des annonces** : Création, édition et suppression des annonces de Job Dating.
- 🏢 **Gestion des entreprises partenaires** : Création et administration des entreprises.
- 🔐 **Sécurité** : Système d'authentification sécurisé pour les administrateurs.
- 🖥️ **Interface utilisateur** : Interface claire pour consulter les annonces de Job Dating.
- 🛡️ **Gestion des permissions** : Rôles d'administration flexible.
- ♻️ **SoftDeletes** : Restauration des annonces supprimées.

---

## ⚙️ **Optimisations Techniques**

- 🚀 **Optimisation des performances** : Amélioration des temps de chargement et réduction des requêtes redondantes.
- 📊 **Indexation PostgreSQL** : Mise en place d'index pour accélérer les requêtes.
- ⚡ **Chargement dynamique avec AJAX** : Mise à jour des données sans rechargement complet des pages.
- 📋 **Utilisation de Schema Builder (bonus)** : Simplification de la gestion des schémas de base de données avec Eloquent ORM.

---

## 💻 **Technologies Requises**

- 🛠️ **Architecture MVC personnalisée** : Respect des principes clés pour une organisation optimale.
- 🌐 **Frontend** : HTML, CSS, JavaScript, avec Twig comme moteur de templates.
- 🧑‍💻 **Backend** : PHP avec gestion des routes, contrôleurs et modèles.
- 🗄️ **Base de données** : PostgreSQL.

---

## 👤 **User Stories**

1. 👨‍💼 **En tant qu'administrateur,** je peux me connecter à l'application en utilisant mes identifiants sécurisés.
2. 🏢 **En tant qu'administrateur,** je peux créer une nouvelle entreprise partenaire en spécifiant les détails pertinents.
3. 📢 **En tant qu'administrateur,** je peux créer une nouvelle annonce en spécifiant les détails pertinents.
4. 📝 **En tant qu'administrateur,** je peux éditer une annonce existante pour mettre à jour les informations.
5. ❌ **En tant qu'administrateur,** je peux supprimer une annonce qui n’est plus pertinente.
6. ♻️ **En tant qu'administrateur,** je peux restaurer une annonce qui a été supprimée.
7. 👩‍🎓 **En tant qu’apprenant,** je peux consulter les annonces de Job Dating disponibles.

---

## 🗂️ **Modélisation des Données**

### 📊 **Tables principales**

- **users** : Contient les informations relatives aux administrateurs et utilisateurs.
- **companies** : Contient les détails sur les entreprises partenaires.
- **announcements** : Gère les informations liées aux annonces de Job Dating.

---

Ce projet offre une solution complète pour la gestion des événements de Job Dating chez YouCode tout en optimisant l'expérience utilisateur.