# 🎵 TechMusic

A sleek, full-stack Single Page Application (SPA) music streaming platform inspired by Spotify and SoundCloud. Built with a robust Laravel backend, a dynamic React frontend, and seamlessly unified via Inertia.js.

##  Features

* **SPA Architecture:** Blazing fast navigation without a single page reload, driven by Inertia.js.
* **Audio Playback Engine:** Full music control deck tracking real-time play, pause, and track skipping (Next/Previous) utilizing native React hooks.
* **SoundCloud-Style Waveform:** Custom vertical audio amplitude bar spectrum that lights up dynamically based on track progression coordinates.
* **Memory Persistent Library:** Client-side "Favorites" utility mapping user choices to browser `localStorage` for state persistence across sessions.
* **Content Control Center:** Full multi-part file upload Admin Panel to safely handle audio streaming binaries (`.mp3`/`.mp4`) and cover art uploads.

##  Tech Stack

* **Backend:** Laravel 12 (Eloquent ORM)
* **Frontend:** React, Tailwind CSS
* **Bridge:** Inertia.js
* **Database:** MariaDB

##  Installation & Setup

1. **Clone the repository:** but still you must have npm_modules
   ```bash 
   git clone [https://github.com/yourusername/laravel-music.git](https://github.com/yourusername/laravel-music.git)
   cd laravel-music
