<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FlatCat Vocab</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700&family=Work+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap">
<style>
  :root {
    --paper: #eef3ec;
    --card: #ffffff;
    --ink: #1e2a28;
    --ink-soft: #52625d;
    --line: #d7ded2;
    --ginger: #e0742f;
    --ginger-ink: #ffffff;
    --moss: #3f7d5c;
    --moss-ink: #ffffff;
    --plum: #5f4270;
    --plum-ink: #f4eef8;
    --danger: #c1442e;
    --danger-ink: #ffffff;
    --shadow: rgba(30, 42, 40, 0.10);
  }
  @media (prefers-color-scheme: dark) {
    :root:not([data-theme="light"]) {
      --paper: #161d1b;
      --card: #202b28;
      --ink: #eaf0e8;
      --ink-soft: #a4b3ac;
      --line: #33413c;
      --ginger: #ef8c4a;
      --ginger-ink: #1c1006;
      --moss: #5cae82;
      --moss-ink: #0d1f16;
      --plum: #9c7bb2;
      --plum-ink: #1c1424;
      --danger: #e2685a;
      --danger-ink: #2a0f0b;
      --shadow: rgba(0, 0, 0, 0.35);
    }
  }
  :root[data-theme="dark"] {
    --paper: #161d1b;
    --card: #202b28;
    --ink: #eaf0e8;
    --ink-soft: #a4b3ac;
    --line: #33413c;
    --ginger: #ef8c4a;
    --ginger-ink: #1c1006;
    --moss: #5cae82;
    --moss-ink: #0d1f16;
    --plum: #9c7bb2;
    --plum-ink: #1c1424;
    --danger: #e2685a;
    --danger-ink: #2a0f0b;
    --shadow: rgba(0, 0, 0, 0.35);
  }

  * { box-sizing: border-box; }
  body {
    background: var(--paper);
    color: var(--ink);
    font-family: "Work Sans", ui-sans-serif, system-ui, sans-serif;
    padding: 0 20px;
    line-height: 1.5;
  }
  .wrap { max-width: 980px; margin: 0 auto; padding-block: 32px 64px; }

  h1, h2, .display { font-family: "Baloo 2", ui-rounded, system-ui, sans-serif; text-wrap: balance; }
  .mono { font-family: "JetBrains Mono", ui-monospace, monospace; }

  a { color: inherit; }
  button { font-family: inherit; cursor: pointer; }
  :focus-visible { outline: 3px solid var(--ginger); outline-offset: 2px; }

  /* header */
  .hero {
    display: flex;
    align-items: center;
    gap: 18px;
    flex-wrap: wrap;
    margin-bottom: 28px;
  }
  .hero h1 {
    font-size: clamp(1.6rem, 4vw, 2.3rem);
    margin: 0;
    color: var(--ginger);
  }
  .hero p {
    margin: 4px 0 0;
    color: var(--ink-soft);
    font-size: 0.98rem;
  }

  /* controls */
  .controls {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items: stretch;
    margin-bottom: 16px;
  }
  @media (max-width: 480px) {
    .controls { flex-direction: column; }
    .controls > * { width: 100%; }
    #add-toggle { justify-content: center; }
  }
  .search-box {
    flex: 1 1 260px;
    display: flex;
    background: var(--card);
    border: 1.5px solid var(--line);
    border-radius: 12px;
    box-shadow: 0 1px 0 var(--shadow);
    overflow: hidden;
  }
  .search-box input {
    flex: 1;
    border: none;
    background: transparent;
    color: var(--ink);
    padding: 12px 4px 12px 14px;
    font-size: 0.98rem;
    min-width: 0;
  }
  .search-box input::placeholder { color: var(--ink-soft); }
  .search-box input:focus { outline: none; }
  .icon-btn {
    border: none;
    background: transparent;
    color: var(--ink-soft);
    padding: 0 14px;
    display: flex;
    align-items: center;
  }
  .icon-btn:hover { color: var(--moss); }
  .icon-btn svg { width: 20px; height: 20px; }

  .btn {
    border: none;
    border-radius: 12px;
    padding: 12px 18px;
    font-weight: 600;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
  }
  .btn-primary { background: var(--ginger); color: var(--ginger-ink); }
  .btn-primary:hover { filter: brightness(1.06); }
  .btn-ghost {
    background: var(--card);
    color: var(--ink);
    border: 1.5px solid var(--line);
  }
  .btn-ghost:hover { border-color: var(--moss); color: var(--moss); }

  /* add panel + trash panel + game panel share the same card treatment */
  #add-panel, #trash-panel, #game-panel {
    background: var(--card);
    border: 1.5px solid var(--line);
    border-radius: 16px;
    padding: 18px 20px;
    margin-bottom: 22px;
    box-shadow: 0 4px 0 var(--shadow);
  }
  #add-panel h2, #trash-panel h2, #game-panel h2 {
    font-size: 1.15rem;
    margin: 0 0 12px;
    color: var(--moss);
  }

  /* mini game */
  .game-status-row {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    color: var(--ink-soft);
    margin-bottom: 14px;
  }
  .game-status-row .game-score { color: var(--moss); font-weight: 600; }
  .game-question { margin-bottom: 16px; }
  .game-term-row { display: flex; align-items: center; gap: 8px; }
  .game-term-row .term { font-size: 1.5rem; }
  .game-options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
  }
  @media (max-width: 520px) {
    .game-options { grid-template-columns: 1fr; }
  }
  .option-btn {
    text-align: left;
    border: 1.5px solid var(--line);
    background: var(--paper);
    color: var(--ink);
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 0.95rem;
    font-weight: 500;
  }
  .option-btn:hover:not(:disabled) { border-color: var(--moss); }
  .option-btn:disabled { cursor: default; }
  .option-btn.correct { border-color: var(--moss); background: var(--moss); color: var(--moss-ink); }
  .option-btn.wrong { border-color: var(--danger); background: var(--danger); color: var(--danger-ink); }
  .game-footer { margin-top: 16px; }
  .game-footer p { margin: 0 0 10px; font-weight: 600; }
  #game-result p { font-size: 1.05rem; font-weight: 600; margin: 0 0 14px; }
  #game-empty p { color: var(--ink-soft); margin: 0; }
  #trash-list {
    display: flex;
    flex-direction: column;
    max-height: 320px;
    overflow-y: auto;
  }
  .trash-row {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 9px 2px;
    border-bottom: 1px solid var(--line);
  }
  .trash-row:last-child { border-bottom: none; }
  .trash-row-term { flex: 0 0 auto; min-width: 90px; }
  .trash-row-term .term { font-size: 0.95rem; }
  .trash-row-meaning {
    flex: 1;
    font-size: 0.9rem;
    color: var(--ink-soft);
    text-decoration: line-through;
  }
  .restore-btn {
    border: none;
    background: transparent;
    color: var(--moss);
    font-weight: 600;
    font-size: 0.85rem;
    padding: 6px 10px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    flex-shrink: 0;
  }
  .restore-btn:hover { background: var(--paper); }
  .restore-btn svg { width: 15px; height: 15px; }
  .trash-empty { color: var(--ink-soft); font-size: 0.9rem; margin: 8px 0; }
  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 14px;
  }
  .field { display: flex; flex-direction: column; gap: 5px; }
  .field.span-2 { grid-column: 1 / -1; }
  .field label {
    font-size: 0.78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--ink-soft);
  }
  .field input, .field textarea, .field select {
    border: 1.5px solid var(--line);
    border-radius: 9px;
    padding: 9px 11px;
    background: var(--paper);
    color: var(--ink);
    font-size: 0.95rem;
    font-family: inherit;
    resize: vertical;
  }
  .field textarea { min-height: 44px; }
  .field input:focus, .field textarea:focus, .field select:focus { outline: none; border-color: var(--moss); }
  .form-actions { display: flex; gap: 10px; margin-top: 14px; grid-column: 1/-1; }
  @media (max-width: 520px) {
    .form-grid { grid-template-columns: 1fr; }
  }

  .status-row {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 14px;
    color: var(--ink-soft);
    font-size: 0.9rem;
  }
  .status-row .count { color: var(--ink); font-weight: 600; }
  .badge-offline {
    background: var(--plum);
    color: var(--plum-ink);
    padding: 2px 10px;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 600;
  }

  /* mobile tab switcher: hidden on desktop, only matters under the 760px breakpoint */
  .tab-bar {
    display: none;
    gap: 6px;
    background: var(--paper);
    border: 1.5px solid var(--line);
    border-radius: 12px;
    padding: 4px;
    margin-bottom: 16px;
  }
  .tab-btn {
    flex: 1;
    border: none;
    background: transparent;
    color: var(--ink-soft);
    font-weight: 600;
    font-size: 0.92rem;
    padding: 9px 0;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
  }
  .tab-btn svg { width: 17px; height: 17px; }
  .tab-btn.active { background: var(--card); color: var(--ginger); box-shadow: 0 1px 0 var(--shadow); }
  .tab-btn#tab-list.active { color: var(--moss); }

  /* two-panel layout: flashcards left, full list right */
  .columns {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 22px;
    align-items: start;
  }
  @media (max-width: 760px) {
    .tab-bar { display: flex; }
    .columns { grid-template-columns: 1fr; }
    #grid, #list { max-height: 60vh; }
    .columns[data-tab="cards"] .panel-list { display: none; }
    .columns[data-tab="list"] .panel-cards { display: none; }
  }
  .panel-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1.1rem;
    margin: 0 0 12px;
    color: var(--moss);
  }
  .panel-title svg { width: 22px; height: 22px; flex-shrink: 0; }
  .panel-cards .panel-title { color: var(--ginger); }

  /* both panels: same boxed frame, same scroll cap so neither runs off the page */
  .panel-cards, .panel-list {
    background: var(--card);
    border: 1.5px solid var(--line);
    border-radius: 16px;
    padding: 16px 18px;
    box-shadow: 0 3px 0 var(--shadow);
  }

  /* card grid */
  #grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 16px;
    max-height: 640px;
    overflow-y: auto;
    padding-right: 4px;
  }

  #list {
    display: flex;
    flex-direction: column;
    max-height: 640px;
    overflow-y: auto;
    padding-right: 4px;
  }
  .word-row {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 10px 2px;
    border-bottom: 1px solid var(--line);
  }
  .word-row:last-child { border-bottom: none; }
  .word-row-term {
    flex: 0 0 auto;
    min-width: 96px;
  }
  .word-row-term .term { font-size: 1rem; }
  .word-row-term .phonetic { margin-top: 2px; }
  .word-row-meaning {
    flex: 1;
    font-weight: 600;
    padding-top: 2px;
  }
  .word-row .del-btn { color: var(--ink-soft); flex-shrink: 0; }
  .word-row .del-btn:hover { color: var(--ginger); }
  .card-slot { perspective: 1200px; min-height: 200px; }
  .flip {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 200px;
    transform-style: preserve-3d;
    transition: transform 0.5s cubic-bezier(.4,.2,.2,1);
  }
  .card-slot.flipped .flip { transform: rotateY(180deg); }
  .face {
    position: absolute;
    inset: 0;
    backface-visibility: hidden;
    border-radius: 16px;
    padding: 16px 16px 14px;
    display: flex;
    flex-direction: column;
    box-shadow: 0 3px 0 var(--shadow);
    border: 1.5px solid var(--line);
  }
  .face-front {
    background: var(--card);
    cursor: pointer;
  }
  .face-back {
    background: var(--plum);
    color: var(--plum-ink);
    transform: rotateY(180deg);
    cursor: pointer;
  }
  .term, .phonetic, .meaning, .synonym, .example, .word-row-meaning {
    overflow-wrap: anywhere;
  }
  .term { font-family: "Baloo 2", sans-serif; font-size: 1.35rem; font-weight: 600; margin: 0; text-wrap: balance; }
  .phonetic { color: var(--moss); font-size: 0.85rem; margin-top: 4px; }
  .hint { margin-top: auto; font-size: 0.76rem; color: var(--ink-soft); }
  .face-back .hint { color: #d9c9e4; }
  .meaning {
    font-weight: 700;
    font-size: 1.08rem;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .synonym {
    font-size: 0.82rem;
    opacity: 0.85;
    margin-top: 6px;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .example {
    font-size: 0.86rem;
    opacity: 0.9;
    margin-top: 8px;
    font-style: italic;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .card-top { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; gap: 6px; }
  .pos-tag {
    flex-shrink: 0;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 2px 7px;
    border-radius: 999px;
    background: var(--moss);
    color: var(--moss-ink);
    margin-top: 2px;
  }
  .face-back .pos-tag { background: rgba(255,255,255,0.18); color: var(--plum-ink); }
  .word-row-term .pos-tag { margin: 4px 0 0; }
  .del-btn {
    border: none;
    background: transparent;
    color: #d9c9e4;
    opacity: 0.75;
    padding: 2px;
  }
  .del-btn:hover { opacity: 1; color: #ffb4b4; }
  .del-btn svg { width: 16px; height: 16px; display: block; }

  .speak-btn {
    border: none;
    background: transparent;
    color: var(--ginger);
    flex-shrink: 0;
    padding: 2px;
    display: inline-flex;
    align-items: center;
  }
  .speak-btn:hover { color: var(--moss); }
  .speak-btn svg { width: 17px; height: 17px; display: block; }
  .face-back .speak-btn { color: var(--plum-ink); opacity: 0.85; }
  .face-back .speak-btn:hover { opacity: 1; }
  .term-row { display: flex; align-items: center; gap: 6px; }
  .example-row { display: flex; align-items: flex-start; gap: 6px; }
  .example-row .example { flex: 1; margin-top: 0; }
  .example-row .speak-btn { margin-top: 8px; }
  .word-row-term .term-row { gap: 4px; }
  .speak-btn.speaking { color: var(--moss); animation: speak-pulse 0.9s ease-in-out infinite; }
  @media (prefers-reduced-motion: reduce) {
    .speak-btn.speaking { animation: none; }
  }
  @keyframes speak-pulse {
    0%, 100% { opacity: 0.6; }
    50% { opacity: 1; }
  }

  @media (prefers-reduced-motion: reduce) {
    .flip { transition: none; }
  }

  /* empty state */
  #empty-state {
    text-align: center;
    padding: 40px 20px;
    color: var(--ink-soft);
  }
  #empty-state svg { width: 96px; height: 96px; margin-bottom: 6px; }
  #empty-state p { margin: 4px 0; }

  footer {
    margin-top: 40px;
    color: var(--ink-soft);
    font-size: 0.82rem;
    text-align: center;
  }

  [hidden] { display: none !important; }
</style>
</head>
<body>

<div class="wrap">
  <header class="hero">
    <svg viewBox="0 0 100 100" width="64" height="64" aria-hidden="true">
      <ellipse cx="50" cy="62" rx="30" ry="24" style="fill:var(--ginger)"></ellipse>
      <path d="M22 68 Q10 78 6 60 Q16 62 22 68 Z" style="fill:var(--ginger)"></path>
      <circle cx="50" cy="38" r="24" style="fill:var(--ginger)"></circle>
      <path d="M28 26 L34 4 L44 24 Z" style="fill:var(--ginger)"></path>
      <path d="M72 26 L66 4 L56 24 Z" style="fill:var(--ginger)"></path>
      <path d="M31 28 L36 10 L42 25 Z" style="fill:var(--moss)"></path>
      <path d="M69 28 L64 10 L58 25 Z" style="fill:var(--moss)"></path>
      <path d="M38 40 Q50 46 62 40" stroke="var(--ink)" stroke-width="2.4" fill="none" stroke-linecap="round"></path>
      <circle cx="40" cy="34" r="2.6" style="fill:var(--ink)"></circle>
      <circle cx="60" cy="34" r="2.6" style="fill:var(--ink)"></circle>
      <path d="M50 39 L46 44 L54 44 Z" style="fill:var(--ink)"></path>
    </svg>
    <div>
      <h1>FlatCat Vocab</h1>
      <p>Chú mèo flat cùng bạn học và ôn từ vựng tiếng Anh mỗi ngày.</p>
    </div>
  </header>

  <div class="controls">
    <form class="search-box" id="search-form" role="search">
      <input id="search-input" type="search" placeholder="Tìm từ hoặc nghĩa..." aria-label="Tìm kiếm từ vựng">
      <button type="submit" class="icon-btn" id="search-btn" aria-label="Tìm kiếm">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><path d="M21 21l-4.3-4.3"></path></svg>
      </button>
    </form>
    <button class="btn btn-primary" id="add-toggle" aria-expanded="false" aria-controls="add-panel">
      <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M12 5v14M5 12h14"></path></svg>
      Thêm từ vựng
    </button>
    <button class="btn btn-ghost" id="trash-toggle" aria-expanded="false" aria-controls="trash-panel">
      <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 2.6-6.4L3 8"></path><path d="M3 3v5h5"></path></svg>
      Lịch sử xóa (<span id="trash-count">0</span>)
    </button>
    <button class="btn btn-ghost" id="game-toggle" aria-expanded="false" aria-controls="game-panel">
      <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="4"></rect><circle cx="8.5" cy="8.5" r="1.4" fill="currentColor" stroke="none"></circle><circle cx="15.5" cy="15.5" r="1.4" fill="currentColor" stroke="none"></circle><circle cx="15.5" cy="8.5" r="1.4" fill="currentColor" stroke="none"></circle><circle cx="8.5" cy="15.5" r="1.4" fill="currentColor" stroke="none"></circle></svg>
      Mini game
    </button>
  </div>

  <section id="game-panel" hidden>
    <h2>Mini game &middot; Đoán nghĩa từ vựng</h2>
    <div id="game-empty" hidden>
      <p>Cần ít nhất 4 từ vựng trong danh sách để chơi mini game.</p>
    </div>
    <div id="game-body">
      <div class="game-status-row">
        <span id="game-progress">Câu 1</span>
        <span class="game-score" id="game-score">Điểm: 0</span>
      </div>
      <div class="game-question">
        <div class="game-term-row">
          <p class="term" id="game-term"></p>
          <button class="speak-btn" type="button" id="game-speak" aria-label="Phát âm từ này">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5 6 9H3v6h3l5 4V5Z"></path><path d="M15.5 8.5a5 5 0 0 1 0 7"></path><path d="M18.5 6a9 9 0 0 1 0 12"></path></svg>
          </button>
        </div>
        <p class="phonetic mono" id="game-phonetic"></p>
      </div>
      <div class="game-options" id="game-options"></div>
      <div class="game-footer" id="game-footer" hidden>
        <p id="game-feedback"></p>
        <button class="btn btn-primary" type="button" id="game-next">Câu tiếp theo</button>
      </div>
    </div>
    <div id="game-result" hidden>
      <p id="game-result-text"></p>
      <button class="btn btn-primary" type="button" id="game-restart">Chơi lại</button>
    </div>
  </section>

  <section id="trash-panel" hidden>
    <h2>Lịch sử xóa</h2>
    <div id="trash-list"></div>
    <p id="trash-empty" class="trash-empty" hidden>Chưa xóa từ nào.</p>
    <div class="form-actions">
      <button type="button" class="btn btn-ghost" id="clear-trash">Xóa hết lịch sử</button>
    </div>
  </section>

  <section id="add-panel" hidden>
    <h2>Từ mới</h2>
    <form id="word-form">
      <div class="form-grid">
        <div class="field">
          <label for="f-term">Từ tiếng Anh</label>
          <input id="f-term" required placeholder="ví dụ: whisker">
        </div>
        <div class="field">
          <label for="f-phonetic">Phiên âm (không bắt buộc)</label>
          <input id="f-phonetic" placeholder="/ˈwɪskər/">
        </div>
        <div class="field">
          <label for="f-pos">Loại từ</label>
          <select id="f-pos">
            <option value="v">Động từ (v)</option>
            <option value="n">Danh từ (n)</option>
            <option value="adj">Tính từ (adj)</option>
            <option value="adv">Trạng từ (adv)</option>
          </select>
        </div>
        <div class="field">
          <label for="f-synonym">Từ đồng nghĩa (không bắt buộc)</label>
          <input id="f-synonym" placeholder="ví dụ: reserve /rɪˈzɜːv/">
        </div>
        <div class="field span-2">
          <label for="f-meaning">Nghĩa tiếng Việt</label>
          <input id="f-meaning" required placeholder="ví dụ: râu mèo">
        </div>
        <div class="field span-2">
          <label for="f-example">Câu ví dụ (không bắt buộc)</label>
          <textarea id="f-example" placeholder="The cat's whiskers twitched."></textarea>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Lưu từ</button>
          <button type="button" class="btn btn-ghost" id="cancel-add">Hủy</button>
        </div>
      </div>
    </form>
  </section>

  <div class="status-row">
    <span><span class="count mono" id="word-count">0</span> từ &middot; lật thẻ để ôn nhanh, hoặc xem trọn bộ nghĩa trong danh sách</span>
    <span class="badge-offline">Lưu trên máy chủ (MySQL)</span>
  </div>

  <div id="empty-state" hidden>
    <svg viewBox="0 0 100 100" aria-hidden="true">
      <ellipse cx="50" cy="66" rx="26" ry="20" style="fill:var(--line)"></ellipse>
      <circle cx="50" cy="42" r="20" style="fill:var(--line)"></circle>
      <path d="M32 32 L37 16 L46 30 Z" style="fill:var(--line)"></path>
      <path d="M68 32 L63 16 L54 30 Z" style="fill:var(--line)"></path>
      <path d="M42 46 Q50 40 58 46" stroke="var(--ink-soft)" stroke-width="2.2" fill="none" stroke-linecap="round"></path>
    </svg>
    <p id="empty-msg">Chưa có từ nào khớp.</p>
  </div>

  <div class="tab-bar" id="tab-bar" role="tablist">
    <button type="button" class="tab-btn active" id="tab-cards" role="tab" aria-selected="true" aria-controls="columns">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 8a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V8Z"></path><path d="M9 9h.01M15 9h.01M9 14c1 1 5 1 6 0"></path></svg>
      FlatCat
    </button>
    <button type="button" class="tab-btn" id="tab-list" role="tab" aria-selected="false" aria-controls="columns">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h10"></path></svg>
      Từ vựng
    </button>
  </div>

  <div class="columns" id="columns" data-tab="cards">
    <section class="panel panel-cards">
      <h2 class="panel-title">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 8a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V8Z"></path><path d="M9 9h.01M15 9h.01M9 14c1 1 5 1 6 0"></path></svg>
        FlatCat &middot; Thẻ học
      </h2>
      <div id="grid"></div>
    </section>
    <section class="panel panel-list">
      <h2 class="panel-title">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h10"></path></svg>
        Toàn bộ từ vựng
      </h2>
      <div id="list"></div>
    </section>
  </div>

  <footer>Dữ liệu được lưu trong cơ sở dữ liệu MySQL trên máy chủ, dùng chung cho mọi trình duyệt/thiết bị.</footer>
</div>

<script>
(function () {
  var gridEl = document.getElementById('grid');
  var listEl = document.getElementById('list');
  var columnsEl = document.getElementById('columns');
  var emptyEl = document.getElementById('empty-state');
  var emptyMsg = document.getElementById('empty-msg');
  var countEl = document.getElementById('word-count');
  var addPanel = document.getElementById('add-panel');
  var addToggle = document.getElementById('add-toggle');
  var trashPanel = document.getElementById('trash-panel');
  var trashToggle = document.getElementById('trash-toggle');
  var trashListEl = document.getElementById('trash-list');
  var trashEmptyEl = document.getElementById('trash-empty');
  var trashCountEl = document.getElementById('trash-count');
  var gamePanel = document.getElementById('game-panel');
  var gameToggle = document.getElementById('game-toggle');
  var gameEmptyEl = document.getElementById('game-empty');
  var gameBodyEl = document.getElementById('game-body');
  var gameResultEl = document.getElementById('game-result');
  var gameProgressEl = document.getElementById('game-progress');
  var gameScoreEl = document.getElementById('game-score');
  var gameTermEl = document.getElementById('game-term');
  var gamePhoneticEl = document.getElementById('game-phonetic');
  var gameSpeakBtn = document.getElementById('game-speak');
  var gameOptionsEl = document.getElementById('game-options');
  var gameFooterEl = document.getElementById('game-footer');
  var gameFeedbackEl = document.getElementById('game-feedback');
  var gameNextBtn = document.getElementById('game-next');
  var gameResultText = document.getElementById('game-result-text');
  var gameRestartBtn = document.getElementById('game-restart');

  var allWords = [];
  var trash = [];
  var query = '';
  var gameQueue = [];
  var gameIndex = 0;
  var gameScore = 0;
  var gameAnswered = false;

  var SPEECH_OK = ('speechSynthesis' in window);
  var SPEAK_ICON = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5 6 9H3v6h3l5 4V5Z"></path><path d="M15.5 8.5a5 5 0 0 1 0 7"></path><path d="M18.5 6a9 9 0 0 1 0 12"></path></svg>';
  var cachedVoices = [];

  function refreshVoices() {
    if (SPEECH_OK) cachedVoices = window.speechSynthesis.getVoices() || [];
  }
  if (SPEECH_OK) {
    refreshVoices();
    window.speechSynthesis.onvoiceschanged = refreshVoices;
  }

  var MALE_VOICE_HINTS = ['male', 'david', 'mark', 'guy', 'daniel', 'james', 'alex', 'fred', 'ryan', 'andrew', 'brian', 'christopher', 'eric', 'george', 'thomas', 'oliver', 'liam', 'noah', 'nam'];
  var FEMALE_VOICE_HINTS = ['female', 'zira', 'susan', 'samantha', 'karen', 'victoria', 'aria', 'jenny', 'linda', 'emma', 'ava', 'sonia', 'libby', 'nữ'];

  function isMaleVoiceName(v) {
    var n = v.name.toLowerCase();
    if (FEMALE_VOICE_HINTS.some(function (h) { return n.indexOf(h) !== -1; })) return false;
    return MALE_VOICE_HINTS.some(function (h) { return n.indexOf(h) !== -1; });
  }

  function pickEnglishVoice() {
    var voices = cachedVoices.length ? cachedVoices : (SPEECH_OK ? window.speechSynthesis.getVoices() : []);
    if (!voices || !voices.length) return null;
    var english = voices.filter(function (v) { return /^en/i.test(v.lang); });
    if (!english.length) return null;
    return english.find(isMaleVoiceName) ||
      english.find(function (v) { return /^en-US/i.test(v.lang); }) ||
      english.find(function (v) { return /^en-GB/i.test(v.lang); }) ||
      english[0];
  }

  function speakBtnHtml(label) {
    return '<button class="speak-btn" type="button" aria-label="Phát âm ' + escapeHtml(label) + '">' + SPEAK_ICON + '</button>';
  }

  function speak(text, btn) {
    if (!SPEECH_OK || !text) return;
    document.querySelectorAll('.speak-btn.speaking').forEach(function (b) { b.classList.remove('speaking'); });
    window.speechSynthesis.cancel();
    var utter = new SpeechSynthesisUtterance(text);
    utter.lang = 'en-US';
    refreshVoices();
    var voice = pickEnglishVoice();
    if (voice) utter.voice = voice;
    utter.rate = 0.92;
    if (btn) {
      btn.classList.add('speaking');
      utter.onend = function () { btn.classList.remove('speaking'); };
      utter.onerror = function () { btn.classList.remove('speaking'); };
    }
    window.speechSynthesis.speak(utter);
  }

  function escapeHtml(s) {
    return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) {
      return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
  }

  function matches(w, q) {
    if (!q) return true;
    var hay = (w.term + ' ' + w.meaning).toLowerCase();
    return hay.indexOf(q) !== -1;
  }

  function render() {
    var q = query.trim().toLowerCase();
    var visible = allWords.filter(function (w) { return matches(w, q); });

    countEl.textContent = allWords.length;

    gridEl.innerHTML = '';
    listEl.innerHTML = '';
    if (visible.length === 0) {
      emptyEl.hidden = false;
      columnsEl.hidden = true;
      emptyMsg.textContent = allWords.length === 0
        ? 'Chưa có từ nào — nhấn "Thêm từ vựng" để bắt đầu.'
        : 'Không tìm thấy từ khớp với "' + query.trim() + '".';
      return;
    }
    emptyEl.hidden = true;
    columnsEl.hidden = false;

    visible.forEach(function (w) {
      var row = document.createElement('div');
      row.className = 'word-row';
      row.innerHTML =
        '<div class="word-row-term"><div class="term-row"><p class="term">' + escapeHtml(w.term) + '</p>' +
        (SPEECH_OK ? speakBtnHtml(w.term) : '') + '</div>' +
        (w.phonetic ? '<p class="phonetic mono">' + escapeHtml(w.phonetic) + '</p>' : '') +
        (w.pos ? '<span class="pos-tag">' + escapeHtml(w.pos) + '</span>' : '') + '</div>' +
        '<p class="word-row-meaning">' + escapeHtml(w.meaning) +
        (w.synonym ? '<br><span class="synonym">&asymp; ' + escapeHtml(w.synonym) + '</span>' : '') + '</p>' +
        '<button class="del-btn" type="button" aria-label="Xóa từ ' + escapeHtml(w.term) + '">' +
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"></path></svg>' +
        '</button>';
      row.querySelector('.del-btn').addEventListener('click', function () { removeWord(w.id, w.term); });
      var rowSpeakBtn = row.querySelector('.speak-btn');
      if (rowSpeakBtn) rowSpeakBtn.addEventListener('click', function () { speak(w.term, rowSpeakBtn); });
      listEl.appendChild(row);
    });

    visible.forEach(function (w) {
      var slot = document.createElement('div');
      slot.className = 'card-slot';

      var flip = document.createElement('div');
      flip.className = 'flip';

      var front = document.createElement('div');
      front.className = 'face face-front';
      front.innerHTML =
        '<div class="card-top"><div class="term-row"><p class="term">' + escapeHtml(w.term) + '</p>' +
        (SPEECH_OK ? speakBtnHtml(w.term) : '') + '</div>' +
        (w.pos ? '<span class="pos-tag">' + escapeHtml(w.pos) + '</span>' : '') + '</div>' +
        (w.phonetic ? '<p class="phonetic mono">' + escapeHtml(w.phonetic) + '</p>' : '') +
        '<p class="hint">Chạm để xem nghĩa</p>';

      var back = document.createElement('div');
      back.className = 'face face-back';
      back.innerHTML =
        '<div class="card-top"><p class="meaning">' + escapeHtml(w.meaning) + '</p>' +
        '<button class="del-btn" type="button" aria-label="Xóa từ ' + escapeHtml(w.term) + '">' +
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"></path></svg>' +
        '</button></div>' +
        (w.synonym ? '<p class="synonym">&asymp; ' + escapeHtml(w.synonym) + '</p>' : '') +
        (w.example ? '<div class="example-row"><p class="example">"' + escapeHtml(w.example) + '"</p>' + (SPEECH_OK ? speakBtnHtml(w.example) : '') + '</div>' : '') +
        '<p class="hint">Chạm để lật lại</p>';

      flip.appendChild(front);
      flip.appendChild(back);
      slot.appendChild(flip);

      function toggle() { slot.classList.toggle('flipped'); }
      front.addEventListener('click', function (e) {
        if (e.target.closest('.speak-btn')) return;
        toggle();
      });
      back.addEventListener('click', function (e) {
        if (e.target.closest('.del-btn') || e.target.closest('.speak-btn')) return;
        toggle();
      });
      back.querySelector('.del-btn').addEventListener('click', function (e) {
        e.stopPropagation();
        removeWord(w.id, w.term);
      });
      var frontSpeakBtn = front.querySelector('.speak-btn');
      if (frontSpeakBtn) frontSpeakBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        speak(w.term, frontSpeakBtn);
      });
      var backSpeakBtn = back.querySelector('.speak-btn');
      if (backSpeakBtn) backSpeakBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        speak(w.example, backSpeakBtn);
      });

      gridEl.appendChild(slot);
    });
  }

  function setWords(list) {
    allWords = list;
    render();
  }

  var API_URL = 'api.php';

  function apiGet(action) {
    return fetch(API_URL + '?action=' + action).then(function (r) { return r.json(); });
  }
  function apiPost(action, params) {
    var body = new URLSearchParams(Object.assign({ action: action }, params));
    return fetch(API_URL, { method: 'POST', body: body }).then(function (r) { return r.json(); });
  }

  function addWord(data) {
    apiPost('add', data).then(function () {
      return apiGet('words');
    }).then(function (words) {
      setWords(words);
    });
  }

  function removeWord(id, term) {
    var ok = window.confirm(
      term ? 'Xóa từ "' + term + '"? Bạn có thể khôi phục lại trong "Lịch sử xóa" sau đó.'
        : 'Xóa từ này? Bạn có thể khôi phục lại trong "Lịch sử xóa" sau đó.'
    );
    if (!ok) return;
    apiPost('delete', { id: id }).then(function () {
      return Promise.all([apiGet('words'), apiGet('trash')]);
    }).then(function (results) {
      setWords(results[0]);
      trash = results[1];
      renderTrash();
    });
  }

  function restoreWord(id) {
    apiPost('restore', { id: id }).then(function () {
      return Promise.all([apiGet('words'), apiGet('trash')]);
    }).then(function (results) {
      setWords(results[0]);
      trash = results[1];
      renderTrash();
    });
  }

  function clearTrash() {
    if (!trash.length) return;
    if (!window.confirm('Xóa hết lịch sử xóa? Sẽ không thể khôi phục các từ này nữa.')) return;
    apiPost('clear_trash', {}).then(function () {
      trash = [];
      renderTrash();
    });
  }

  function renderTrash() {
    trashCountEl.textContent = trash.length;
    trashListEl.innerHTML = '';
    trashEmptyEl.hidden = trash.length !== 0;
    trash.forEach(function (w) {
      var row = document.createElement('div');
      row.className = 'trash-row';
      row.innerHTML =
        '<div class="trash-row-term"><p class="term">' + escapeHtml(w.term) + '</p></div>' +
        '<p class="trash-row-meaning">' + escapeHtml(w.meaning) + '</p>' +
        '<button type="button" class="restore-btn">' +
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 2.6-6.4L3 8"></path><path d="M3 3v5h5"></path></svg>' +
        'Khôi phục</button>';
      row.querySelector('.restore-btn').addEventListener('click', function () { restoreWord(w.id); });
      trashListEl.appendChild(row);
    });
  }

  function shuffle(arr) {
    var a = arr.slice();
    for (var i = a.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var tmp = a[i]; a[i] = a[j]; a[j] = tmp;
    }
    return a;
  }

  function pickDistractors(word, count) {
    var candidates = shuffle(allWords.filter(function (w) { return w.id !== word.id; }));
    var picked = [];
    var seenMeanings = {};
    seenMeanings[word.meaning] = true;
    candidates.forEach(function (w) {
      if (picked.length >= count || seenMeanings[w.meaning]) return;
      seenMeanings[w.meaning] = true;
      picked.push(w);
    });
    if (picked.length < count) {
      candidates.forEach(function (w) {
        if (picked.length >= count || picked.indexOf(w) !== -1) return;
        picked.push(w);
      });
    }
    return picked.slice(0, count);
  }

  function startGame() {
    if (allWords.length < 4) {
      gameEmptyEl.hidden = false;
      gameBodyEl.hidden = true;
      gameResultEl.hidden = true;
      return;
    }
    gameEmptyEl.hidden = true;
    gameResultEl.hidden = true;
    gameBodyEl.hidden = false;
    gameQueue = shuffle(allWords);
    gameIndex = 0;
    gameScore = 0;
    renderGameQuestion();
  }

  function renderGameQuestion() {
    gameAnswered = false;
    var word = gameQueue[gameIndex];
    gameProgressEl.textContent = 'Câu ' + (gameIndex + 1) + '/' + gameQueue.length;
    gameScoreEl.textContent = 'Điểm: ' + gameScore;
    gameTermEl.textContent = word.term;
    gamePhoneticEl.textContent = word.phonetic || '';
    gamePhoneticEl.hidden = !word.phonetic;
    gameFooterEl.hidden = true;
    gameFeedbackEl.textContent = '';

    var options = shuffle([word].concat(pickDistractors(word, 3)));
    var optionButtons = [];
    gameOptionsEl.innerHTML = '';
    options.forEach(function (opt) {
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'option-btn';
      btn.textContent = opt.meaning;
      btn.addEventListener('click', function () { handleGameAnswer(opt, word, btn, optionButtons); });
      gameOptionsEl.appendChild(btn);
      optionButtons.push({ opt: opt, btn: btn });
    });
  }

  function handleGameAnswer(chosen, correctWord, btnEl, optionButtons) {
    if (gameAnswered) return;
    gameAnswered = true;
    var isCorrect = chosen.id === correctWord.id;
    if (isCorrect) gameScore++;
    gameScoreEl.textContent = 'Điểm: ' + gameScore;
    optionButtons.forEach(function (o) {
      o.btn.disabled = true;
      if (o.opt.id === correctWord.id) o.btn.classList.add('correct');
      else if (o.btn === btnEl) o.btn.classList.add('wrong');
    });
    gameFeedbackEl.textContent = isCorrect ? 'Chính xác!' : 'Chưa đúng — nghĩa đúng là: ' + correctWord.meaning;
    gameNextBtn.textContent = (gameIndex + 1 < gameQueue.length) ? 'Câu tiếp theo' : 'Xem kết quả';
    gameFooterEl.hidden = false;
  }

  function finishGame() {
    gameBodyEl.hidden = true;
    gameResultEl.hidden = false;
    gameResultText.textContent = 'Bạn trả lời đúng ' + gameScore + '/' + gameQueue.length + ' câu.';
  }

  gameNextBtn.addEventListener('click', function () {
    gameIndex++;
    if (gameIndex >= gameQueue.length) {
      finishGame();
    } else {
      renderGameQuestion();
    }
  });
  gameRestartBtn.addEventListener('click', startGame);
  gameSpeakBtn.addEventListener('click', function () { speak(gameTermEl.textContent, gameSpeakBtn); });

  function loadFromServer() {
    Promise.all([apiGet('words'), apiGet('trash')]).then(function (results) {
      setWords(results[0]);
      trash = results[1];
      renderTrash();
    });
  }

  document.getElementById('search-form').addEventListener('submit', function (e) {
    e.preventDefault();
    query = document.getElementById('search-input').value;
    render();
  });
  document.getElementById('search-input').addEventListener('input', function (e) {
    query = e.target.value;
    render();
  });

  var tabCards = document.getElementById('tab-cards');
  var tabList = document.getElementById('tab-list');
  function setTab(name) {
    columnsEl.dataset.tab = name;
    tabCards.classList.toggle('active', name === 'cards');
    tabList.classList.toggle('active', name === 'list');
    tabCards.setAttribute('aria-selected', String(name === 'cards'));
    tabList.setAttribute('aria-selected', String(name === 'list'));
  }
  tabCards.addEventListener('click', function () { setTab('cards'); });
  tabList.addEventListener('click', function () { setTab('list'); });

  var panels = [
    { el: addPanel, toggle: addToggle },
    { el: trashPanel, toggle: trashToggle },
    { el: gamePanel, toggle: gameToggle }
  ];
  function togglePanel(target) {
    var opening = target.el.hidden;
    panels.forEach(function (p) {
      p.el.hidden = true;
      p.toggle.setAttribute('aria-expanded', 'false');
    });
    if (opening) {
      target.el.hidden = false;
      target.toggle.setAttribute('aria-expanded', 'true');
    }
    return opening;
  }

  addToggle.addEventListener('click', function () {
    if (togglePanel(panels[0])) document.getElementById('f-term').focus();
  });
  document.getElementById('cancel-add').addEventListener('click', function () {
    addPanel.hidden = true;
    addToggle.setAttribute('aria-expanded', 'false');
    document.getElementById('word-form').reset();
  });

  trashToggle.addEventListener('click', function () { togglePanel(panels[1]); });
  document.getElementById('clear-trash').addEventListener('click', clearTrash);

  gameToggle.addEventListener('click', function () {
    if (togglePanel(panels[2])) startGame();
  });

  document.getElementById('word-form').addEventListener('submit', function (e) {
    e.preventDefault();
    var term = document.getElementById('f-term').value.trim();
    var meaning = document.getElementById('f-meaning').value.trim();
    if (!term || !meaning) return;
    addWord({
      term: term,
      phonetic: document.getElementById('f-phonetic').value.trim(),
      pos: document.getElementById('f-pos').value,
      synonym: document.getElementById('f-synonym').value.trim(),
      meaning: meaning,
      example: document.getElementById('f-example').value.trim()
    });
    e.target.reset();
    addPanel.hidden = true;
    addToggle.setAttribute('aria-expanded', 'false');
  });

  loadFromServer();
})();
</script>
</body>
</html>
