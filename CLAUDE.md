# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A single-page Vietnamese-language English vocabulary flashcard app ("FlatCat Vocab"), deployed as a static site on GitHub Pages: https://hieudev0214.github.io/flatcat-vocab/

## Commands

There is no build, lint, or test tooling in this repo — it's a single static HTML file with inline CSS/JS. To work on it:

- **Preview locally**: open `index.html` directly in a browser, or serve it (e.g. `python -m http.server`) from the repo root.
- **Deploy**: commit and push to `main`; GitHub Pages serves `index.html` at the repo root automatically (no CI/build step).

## Architecture

- **`flatcat-vocab.html` and `index.html` are kept as identical copies.** `index.html` is what GitHub Pages actually serves; `flatcat-vocab.html` is the same file duplicated under its original name. **Any edit must be applied to both files** (or edit one and copy it over the other) before committing — there is no build step that generates one from the other.
- Everything lives in one file: inline `<style>` (CSS custom properties in `:root`, with dark-mode overrides via `prefers-color-scheme` and `[data-theme]`) and inline `<script>` (vanilla JS, no framework, no bundler, no dependencies except a Google Fonts stylesheet link).
- **No backend, no database.** All vocabulary data lives in the browser via `localStorage`, under two keys: `flatcat-vocab-words-v1` (word list) and `flatcat-vocab-trash-v1` (deletion history, capped at 200 entries). This is a deliberate, explicit choice by the project owner — the site must stay a fully self-contained static page with nothing server-side or Claude/Artifact-related. Do not reintroduce a remote/cloud persistence layer (e.g. Claude Artifact's `db` capability) without being asked.
- On first-ever load (no saved `localStorage` data), the word list is seeded from the `SAMPLE_WORDS` array embedded directly in the script (~143 entries, transcribed from the project owner's textbook photos). Each word: `{ id, term, phonetic, pos: 'v'|'n'|'adj'|'adv', synonym?, meaning, example }`.
- Two-column layout (`.columns`): flashcards (flip-card grid, `#grid`) on one side, full list with meanings (`#list`) on the other. Collapses to one column under `max-width: 760px`, where a mobile tab bar (`#tab-bar`, `#tab-cards`/`#tab-list`, driven by `setTab()`) switches between showing only the flashcards or only the list via `#columns[data-tab]`.
- Flip-card effect is pure CSS 3D transforms (`perspective`, `preserve-3d`, `backface-visibility`, `.flipped` toggles `rotateY(180deg)`).
- Text-to-speech uses the Web Speech API. Because `utterance.lang` alone is unreliable for voice selection, `pickEnglishVoice()` explicitly filters `speechSynthesis.getVoices()` for English voices and prefers ones whose name matches `MALE_VOICE_HINTS` over `FEMALE_VOICE_HINTS` (voices load asynchronously, so both `onvoiceschanged` and a manual `refreshVoices()` call right before speaking are used).
- Deleting a word asks for confirmation (`window.confirm`), then moves the entry into the trash array (with a `deletedAt` timestamp) instead of discarding it; the trash panel (`renderTrash()`) supports per-item restore (`restoreWord`) and clearing all history (`clearTrash`).
- All UI copy is Vietnamese — preserve that in any new UI text.

## PHP + MySQL variant (`php/`)

A second, independent variant lives in `php/`: same UI and logic as the static site, but persisted to MySQL instead of `localStorage`, for hosts that support PHP (currently deployed on InfinityFree). This is a deliberate fork, not a replacement — the GitHub Pages site described above stays static and must not be changed to depend on it.

- `index.php` is `flatcat-vocab.html` with the `SAMPLE_WORDS` seed array and the `localStorage` read/write functions replaced by `fetch()` calls (`apiGet`/`apiPost`) against `api.php`; all rendering/flip-card/TTS/tab-switcher code is unchanged.
- `api.php` is a single endpoint dispatching on `?action=` (`words`, `trash`, `add`, `delete`, `restore`, `clear_trash`), using PDO with prepared statements.
- `config.php` defines `DB_HOST`/`DB_NAME`/`DB_USER`/`DB_PASS` and `get_pdo()`, which runs `CREATE TABLE IF NOT EXISTS` for `words` and `trash` on every request and seeds `words` from `data/seed-words.json` (143 entries) only when the table is empty. **The version committed to git has placeholder credentials only** — real credentials are filled in locally and uploaded via FTP straight to the host; never commit or push the real values.
- No build step. To test locally: point `config.php` at a local MySQL database and run `php -S localhost:8000` from `php/`. See `php/README.md` for the full InfinityFree deployment walkthrough (create hosting account, create MySQL DB in vPanel, fill `config.php`, FTP-upload everything in `php/` into `htdocs/`).

## Deployment notes

- Repo remote: `https://github.com/hieudev0214/flatcat-vocab.git`, pushed to `main`; GitHub Pages serves directly from the repo root, so the file **must** be a complete HTML document (`<!DOCTYPE html>`, `<head>` with a `viewport` meta tag, etc.) — a bare Artifact-style fragment without a viewport meta tag will break mobile layout (GitHub Pages doesn't inject one).
- InfinityFree's free subdomains sit behind a JS anti-bot challenge on first load — plain HTTP tools (`curl` without a browser user agent, health checks) will see a challenge page instead of the app; only a real browser can pass it.
