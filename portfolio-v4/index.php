<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta name="description" content="Mohammed Moin Hamza (Dino / n6ble) — Developer, AI Enthusiast & Builder. Turning curiosity into code."/>
<meta name="author" content="Mohammed Moin Hamza"/>
<meta property="og:title" content="Mohammed Moin Hamza — Developer & AI Enthusiast"/>
<meta property="og:description" content="Turning curiosity into code, ideas into projects, and projects into experiences."/>
<meta property="og:image" content="assets/images/dino-logo.jpg"/>
<title>Mohammed Moin Hamza — Developer & AI Enthusiast</title>
<link rel="icon" type="image/jpeg" href="assets/images/dino-logo.jpg"/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<style>
/* =====================================================
   VARIABLES & RESET
===================================================== */
:root{
  --bg:#08080a;--bg2:#0e0e12;--bg3:#13131a;
  --blue:#2563EB;--blue-d:#1d4ed8;--blue-g:rgba(37,99,235,0.12);
  --red:#DC2626;--red-g:rgba(220,38,38,0.1);
  --text:#f4f4f5;--muted:#71717a;--subtle:#3f3f46;
  --border:rgba(255,255,255,0.06);--border2:rgba(255,255,255,0.1);
  --font:'Outfit',sans-serif;
  --ease:cubic-bezier(0.4,0,0.2,1);
  --ease-out:cubic-bezier(0,0,0.2,1);
  --ease-spring:cubic-bezier(0.34,1.56,0.64,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;scrollbar-width:thin;scrollbar-color:var(--blue) var(--bg)}
::-webkit-scrollbar{width:4px}
::-webkit-scrollbar-thumb{background:var(--blue);border-radius:2px}
body{
  font-family:var(--font);background:var(--bg);color:var(--text);
  overflow-x:hidden;line-height:1.7;cursor:none;
  -webkit-font-smoothing:antialiased;
}
a{text-decoration:none;color:inherit}
img{display:block;max-width:100%}
button{font-family:var(--font);cursor:none;border:none;outline:none;background:none}
ul{list-style:none}
section{position:relative}

/* =====================================================
   CURSOR
===================================================== */
#cur-dot{
  position:fixed;width:5px;height:5px;background:#fff;border-radius:50%;
  pointer-events:none;z-index:9999;transform:translate(-50%,-50%);
  transition:transform 0.1s,width 0.2s,height 0.2s,background 0.2s;
}
#cur-ring{
  position:fixed;width:36px;height:36px;
  border:1px solid rgba(255,255,255,0.3);border-radius:50%;
  pointer-events:none;z-index:9998;transform:translate(-50%,-50%);
  transition:width 0.3s var(--ease),height 0.3s var(--ease),border-color 0.3s,transform 0.08s linear;
}
#cur-ring.expand{width:56px;height:56px;border-color:rgba(37,99,235,0.6)}
#cur-glow{
  position:fixed;width:300px;height:300px;border-radius:50%;pointer-events:none;z-index:0;
  background:radial-gradient(circle,rgba(37,99,235,0.06) 0%,transparent 70%);
  transform:translate(-50%,-50%);transition:transform 0.15s linear;
}

/* =====================================================
   SCROLL PROGRESS
===================================================== */
#prog{position:fixed;top:0;left:0;height:1px;background:linear-gradient(90deg,var(--blue),var(--red));z-index:9997;width:0;transition:width 0.1s linear}

/* =====================================================
   NAVBAR
===================================================== */
nav{
  position:fixed;top:0;left:0;right:0;z-index:900;
  padding:0 clamp(1.5rem,5vw,4rem);
  height:64px;display:flex;align-items:center;justify-content:space-between;
  transition:background 0.4s var(--ease),border-color 0.4s;
  border-bottom:1px solid transparent;
}
nav.stuck{
  background:rgba(8,8,10,0.85);backdrop-filter:blur(24px);
  -webkit-backdrop-filter:blur(24px);border-bottom-color:var(--border);
}
.nav-logo{display:flex;align-items:center;gap:10px}
.nav-logo img{width:30px;height:30px;border-radius:50%;object-fit:cover;border:1px solid var(--border2)}
.nav-logo span{font-size:0.95rem;font-weight:700;letter-spacing:0.02em}
.nav-links{display:flex;align-items:center;gap:0.25rem}
.nav-links a{
  padding:6px 14px;font-size:0.82rem;font-weight:500;color:var(--muted);
  border-radius:8px;transition:color 0.2s,background 0.2s;letter-spacing:0.02em;
}
.nav-links a:hover,.nav-links a.on{color:var(--text);background:rgba(255,255,255,0.06)}
.nav-cta{
  padding:8px 20px;border-radius:8px;font-size:0.82rem;font-weight:600;
  background:rgba(255,255,255,0.07);border:1px solid var(--border2);
  color:var(--text);transition:all 0.25s;letter-spacing:0.02em;
}
.nav-cta:hover{background:rgba(37,99,235,0.2);border-color:rgba(37,99,235,0.4)}
.ham{display:none;flex-direction:column;gap:5px;padding:6px;cursor:pointer}
.ham span{display:block;width:22px;height:1.5px;background:var(--text);border-radius:1px;transition:all 0.3s var(--ease)}
.ham.on span:nth-child(1){transform:rotate(45deg) translate(4.5px,4.5px)}
.ham.on span:nth-child(2){opacity:0;transform:scaleX(0)}
.ham.on span:nth-child(3){transform:rotate(-45deg) translate(4.5px,-4.5px)}
.mob-menu{
  position:fixed;inset:0;background:rgba(8,8,10,0.97);backdrop-filter:blur(20px);
  z-index:800;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2rem;
  opacity:0;pointer-events:none;transition:opacity 0.3s var(--ease);
}
.mob-menu.on{opacity:1;pointer-events:auto}
.mob-menu a{font-size:1.8rem;font-weight:700;color:var(--muted);transition:color 0.2s}
.mob-menu a:hover{color:var(--text)}

/* =====================================================
   CANVAS BG
===================================================== */
#bg-canvas{position:fixed;inset:0;z-index:0;pointer-events:none;opacity:0.5}

/* =====================================================
   SECTIONS COMMON
===================================================== */
.wrap{max-width:1140px;margin:0 auto;padding:0 clamp(1.5rem,5vw,4rem);position:relative;z-index:1}
.sec-label{
  display:inline-flex;align-items:center;gap:8px;
  font-size:0.72rem;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;
  color:var(--muted);margin-bottom:14px;
}
.sec-label::before{content:'';width:20px;height:1px;background:var(--blue)}
.sec-title{
  font-size:clamp(2rem,4vw,3.2rem);font-weight:800;line-height:1.1;
  letter-spacing:-0.02em;margin-bottom:16px;
}
.sec-title em{font-style:normal;color:var(--blue)}
.sec-sub{color:var(--muted);font-size:1rem;max-width:480px;line-height:1.7;margin-bottom:64px}

/* =====================================================
   REVEAL ANIMATION
===================================================== */
.rv{opacity:0;transform:translateY(28px);transition:opacity 0.7s var(--ease),transform 0.7s var(--ease)}
.rv.fl{transform:translateX(-28px)}.rv.fr{transform:translateX(28px)}
.rv.up{transform:translateY(40px)}.rv.sc{transform:scale(0.94)}
.rv.vis{opacity:1;transform:none}
.d1{transition-delay:0.08s}.d2{transition-delay:0.16s}.d3{transition-delay:0.24s}
.d4{transition-delay:0.32s}.d5{transition-delay:0.4s}.d6{transition-delay:0.48s}
.d7{transition-delay:0.56s}.d8{transition-delay:0.64s}

/* =====================================================
   HERO
===================================================== */
#home{
  min-height:100vh;display:flex;flex-direction:column;align-items:center;
  justify-content:center;text-align:center;padding:100px clamp(1.5rem,5vw,4rem) 80px;
  position:relative;overflow:hidden;
}
.hero-status{
  display:inline-flex;align-items:center;gap:8px;
  padding:6px 16px;border-radius:100px;
  background:rgba(255,255,255,0.04);border:1px solid var(--border2);
  font-size:0.75rem;font-weight:500;color:var(--muted);
  margin-bottom:36px;letter-spacing:0.04em;
}
.status-dot{width:6px;height:6px;border-radius:50%;background:#22c55e;flex-shrink:0;animation:pulse-g 2s infinite}
@keyframes pulse-g{0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,0.4)}50%{box-shadow:0 0 0 6px rgba(34,197,94,0)}}

.hero-name{
  font-size:clamp(2.6rem,7vw,6rem);font-weight:900;letter-spacing:-0.03em;
  line-height:1.0;margin-bottom:20px;
  background:linear-gradient(180deg,#fff 40%,rgba(255,255,255,0.55));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
}
.hero-role{
  font-size:clamp(0.9rem,2vw,1.1rem);font-weight:400;color:var(--muted);
  letter-spacing:0.12em;text-transform:uppercase;margin-bottom:28px;
}
.hero-role span{color:var(--text);font-weight:500}
.hero-tagline{
  font-size:clamp(1rem,2vw,1.2rem);font-weight:300;color:var(--muted);
  max-width:520px;margin:0 auto 48px;line-height:1.7;font-style:italic;
}
.hero-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-bottom:80px}
.btn-main{
  position:relative;padding:13px 32px;border-radius:10px;font-size:0.9rem;
  font-weight:600;overflow:hidden;transition:all 0.3s var(--ease);cursor:none;
  display:inline-flex;align-items:center;gap:8px;
}
.btn-primary{background:linear-gradient(135deg,var(--blue),var(--blue-d));color:#fff;box-shadow:0 0 0 0 rgba(37,99,235,0)}
.btn-primary:hover{box-shadow:0 0 40px rgba(37,99,235,0.4);transform:translateY(-2px)}
.btn-ghost{border:1px solid var(--border2);color:var(--text);background:rgba(255,255,255,0.04)}
.btn-ghost:hover{border-color:rgba(255,255,255,0.2);background:rgba(255,255,255,0.08);transform:translateY(-2px)}
/* magnetic ripple */
.btn-main::after{content:'';position:absolute;inset:0;background:rgba(255,255,255,0.1);opacity:0;transition:opacity 0.2s}
.btn-main:hover::after{opacity:1}

.hero-scroll{
  position:absolute;bottom:32px;left:50%;transform:translateX(-50%);
  display:flex;flex-direction:column;align-items:center;gap:6px;
  font-size:0.7rem;color:var(--muted);letter-spacing:0.12em;text-transform:uppercase;
}
.scroll-line{width:1px;height:40px;background:linear-gradient(180deg,var(--muted),transparent);margin-top:8px;animation:scroll-pulse 2s ease-in-out infinite}
@keyframes scroll-pulse{0%,100%{transform:scaleY(1);opacity:0.5}50%{transform:scaleY(1.2);opacity:1}}

/* hero grid decoration */
.hero-grid{
  position:absolute;inset:0;pointer-events:none;
  background-image:linear-gradient(rgba(255,255,255,0.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.02) 1px,transparent 1px);
  background-size:60px 60px;mask-image:radial-gradient(ellipse 70% 60% at 50% 50%,black,transparent);
}
.hero-glow-blue{position:absolute;top:20%;left:20%;width:400px;height:400px;border-radius:50%;background:radial-gradient(circle,rgba(37,99,235,0.12),transparent 70%);pointer-events:none;animation:drift 8s ease-in-out infinite}
.hero-glow-red{position:absolute;top:30%;right:15%;width:350px;height:350px;border-radius:50%;background:radial-gradient(circle,rgba(220,38,38,0.08),transparent 70%);pointer-events:none;animation:drift 10s ease-in-out infinite reverse}
@keyframes drift{0%,100%{transform:translate(0,0)}50%{transform:translate(20px,-20px)}}

/* =====================================================
   ABOUT
===================================================== */
#about{padding:120px 0}
.about-grid{display:grid;grid-template-columns:1fr 1.1fr;gap:80px;align-items:center}
.about-visual{position:relative}
.about-card{
  background:var(--bg3);border:1px solid var(--border);border-radius:20px;
  padding:36px;position:relative;overflow:hidden;
}
.about-card::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(37,99,235,0.06),transparent 60%);
  pointer-events:none;
}
.about-avatar{
  width:90px;height:90px;border-radius:50%;object-fit:cover;
  border:2px solid rgba(37,99,235,0.3);margin-bottom:20px;
  box-shadow:0 0 40px rgba(37,99,235,0.2);
}
.about-name-tag{font-size:1.05rem;font-weight:700;margin-bottom:4px}
.about-handles{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px}
.handle{
  padding:3px 10px;border-radius:100px;font-size:0.72rem;font-weight:600;
  background:rgba(37,99,235,0.12);border:1px solid rgba(37,99,235,0.2);color:var(--blue);
}
.about-stat-row{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:20px}
.a-stat{background:rgba(255,255,255,0.03);border:1px solid var(--border);border-radius:12px;padding:14px}
.a-stat-n{font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,var(--blue),var(--red));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.a-stat-l{font-size:0.72rem;color:var(--muted);text-transform:uppercase;letter-spacing:0.08em;margin-top:2px}
.about-text .sec-label{display:flex}
.about-text p{color:var(--muted);margin-bottom:14px;font-size:0.97rem;line-height:1.8}
.about-text p strong{color:var(--text);font-weight:600}
.about-origin{
  margin-top:28px;padding:20px;border-radius:12px;
  background:rgba(255,255,255,0.03);border:1px solid var(--border);
  border-left:2px solid var(--blue);
}
.about-origin p{color:var(--muted);font-size:0.88rem;margin:0;line-height:1.7;font-style:italic}

/* =====================================================
   SKILLS
===================================================== */
#skills{padding:120px 0;background:linear-gradient(180deg,transparent,rgba(37,99,235,0.03) 50%,transparent)}
.skills-header{text-align:center;margin-bottom:64px}
.skills-header .sec-label{justify-content:center}
.skills-header .sec-label::before{display:none}
.skills-header .sec-sub{margin-left:auto;margin-right:auto;text-align:center}
.skills-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:16px}
.sk-card{
  background:var(--bg3);border:1px solid var(--border);border-radius:16px;
  padding:28px 20px;text-align:center;transition:all 0.35s var(--ease);
  position:relative;overflow:hidden;cursor:default;
}
.sk-card::before{
  content:'';position:absolute;inset:0;opacity:0;
  background:linear-gradient(135deg,rgba(37,99,235,0.1),rgba(220,38,38,0.05));
  transition:opacity 0.35s;
}
.sk-card:hover{border-color:rgba(37,99,235,0.3);transform:translateY(-6px);box-shadow:0 20px 60px rgba(0,0,0,0.4),0 0 0 1px rgba(37,99,235,0.1)}
.sk-card:hover::before{opacity:1}
.sk-icon{font-size:1.8rem;color:var(--blue);margin-bottom:14px;position:relative;z-index:1;transition:transform 0.3s var(--ease-spring)}
.sk-card:hover .sk-icon{transform:scale(1.15)}
.sk-name{font-size:0.82rem;font-weight:600;color:var(--text);position:relative;z-index:1;letter-spacing:0.02em}
.sk-tag{font-size:0.68rem;color:var(--muted);margin-top:6px;position:relative;z-index:1}

/* =====================================================
   PROJECTS
===================================================== */
#projects{padding:120px 0}
.proj-header{margin-bottom:64px}
.proj-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(340px,1fr));gap:20px}
.proj-card{
  background:var(--bg3);border:1px solid var(--border);border-radius:20px;
  overflow:hidden;transition:all 0.4s var(--ease);display:flex;flex-direction:column;
  position:relative;
}
.proj-card::after{
  content:'';position:absolute;inset:0;border-radius:20px;
  background:linear-gradient(135deg,rgba(37,99,235,0.06),transparent 50%);
  opacity:0;transition:opacity 0.4s;pointer-events:none;
}
.proj-card:hover{transform:translateY(-8px);border-color:rgba(37,99,235,0.25);box-shadow:0 30px 80px rgba(0,0,0,0.5),0 0 0 1px rgba(37,99,235,0.1)}
.proj-card:hover::after{opacity:1}
.proj-thumb{
  height:160px;background:linear-gradient(135deg,rgba(37,99,235,0.15),rgba(220,38,38,0.08));
  display:flex;align-items:center;justify-content:center;font-size:2.5rem;color:rgba(37,99,235,0.4);
  position:relative;overflow:hidden;
}
.proj-thumb-logo{max-height:70px;object-fit:contain}
.proj-thumb::before{
  content:'';position:absolute;inset:0;
  background:repeating-linear-gradient(45deg,transparent,transparent 20px,rgba(37,99,235,0.03) 20px,rgba(37,99,235,0.03) 40px);
}
.proj-body{padding:24px;flex:1;display:flex;flex-direction:column;position:relative;z-index:1}
.proj-featured{
  position:absolute;top:12px;right:14px;
  padding:3px 10px;border-radius:100px;font-size:0.65rem;font-weight:700;
  background:rgba(37,99,235,0.15);border:1px solid rgba(37,99,235,0.25);color:var(--blue);
  letter-spacing:0.1em;text-transform:uppercase;
}
.proj-title{font-size:1.05rem;font-weight:700;margin-bottom:8px;letter-spacing:-0.01em}
.proj-desc{font-size:0.86rem;color:var(--muted);line-height:1.7;flex:1;margin-bottom:20px}
.proj-tech{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px}
.tech-tag{
  padding:3px 10px;border-radius:100px;font-size:0.68rem;font-weight:600;
  background:rgba(255,255,255,0.05);border:1px solid var(--border);color:var(--muted);
}
.proj-links{display:flex;gap:8px}
.proj-btn{
  display:inline-flex;align-items:center;gap:6px;padding:8px 16px;
  border-radius:8px;font-size:0.78rem;font-weight:600;transition:all 0.25s;cursor:none;
}
.proj-btn.primary{background:rgba(37,99,235,0.15);border:1px solid rgba(37,99,235,0.25);color:var(--blue)}
.proj-btn.primary:hover{background:rgba(37,99,235,0.25);border-color:rgba(37,99,235,0.5)}
.proj-btn.ghost{background:rgba(255,255,255,0.04);border:1px solid var(--border);color:var(--muted)}
.proj-btn.ghost:hover{color:var(--text);border-color:var(--border2)}

/* =====================================================
   JOURNEY
===================================================== */
#journey{padding:120px 0;background:linear-gradient(180deg,transparent,rgba(220,38,38,0.02) 50%,transparent)}
.journey-header{text-align:center;margin-bottom:80px}
.journey-header .sec-label{justify-content:center}
.journey-header .sec-label::before{display:none}
.timeline{position:relative;max-width:680px;margin:0 auto}
.timeline::before{
  content:'';position:absolute;left:50%;top:0;bottom:0;width:1px;
  background:linear-gradient(180deg,transparent,var(--blue) 10%,var(--red) 90%,transparent);
  transform:translateX(-50%);
}
.tl-item{
  display:flex;align-items:center;gap:0;margin-bottom:0;
  position:relative;
}
.tl-item:nth-child(odd) .tl-content{margin-right:calc(50% + 32px);text-align:right}
.tl-item:nth-child(even) .tl-content{margin-left:calc(50% + 32px);text-align:left}
.tl-node{
  position:absolute;left:50%;transform:translate(-50%,-50%);top:50%;
  width:12px;height:12px;border-radius:50%;background:var(--bg);
  border:2px solid var(--blue);z-index:2;transition:all 0.3s;
}
.tl-item:hover .tl-node{background:var(--blue);box-shadow:0 0 20px rgba(37,99,235,0.5);transform:translate(-50%,-50%) scale(1.4)}
.tl-content{
  padding:20px 0 20px;width:calc(50% - 32px);
  opacity:0;transition:opacity 0.6s var(--ease),transform 0.6s var(--ease);
}
.tl-item:nth-child(odd) .tl-content{transform:translateX(-20px)}
.tl-item:nth-child(even) .tl-content{transform:translateX(20px)}
.tl-content.vis{opacity:1;transform:translateX(0)}
.tl-card{
  background:var(--bg3);border:1px solid var(--border);border-radius:12px;
  padding:16px 18px;transition:all 0.3s;
}
.tl-item:hover .tl-card{border-color:rgba(37,99,235,0.25)}
.tl-step{font-size:0.65rem;color:var(--blue);font-weight:700;letter-spacing:0.14em;text-transform:uppercase;margin-bottom:4px}
.tl-title{font-size:0.92rem;font-weight:700;margin-bottom:4px}
.tl-desc{font-size:0.78rem;color:var(--muted);line-height:1.6}

/* =====================================================
   LEARNING
===================================================== */
#learning{padding:120px 0}
.learn-header{text-align:center;margin-bottom:64px}
.learn-header .sec-label{justify-content:center;margin-bottom:14px}
.learn-header .sec-label::before{display:none}
.learn-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px}
.learn-card{
  background:var(--bg3);border:1px solid var(--border);border-radius:16px;
  padding:24px;transition:all 0.35s var(--ease);position:relative;overflow:hidden;
}
.learn-card::before{content:'';position:absolute;top:-1px;left:0;right:0;height:2px;background:linear-gradient(90deg,transparent,var(--blue),transparent);opacity:0;transition:opacity 0.35s}
.learn-card:hover{border-color:rgba(37,99,235,0.2);transform:translateY(-4px)}
.learn-card:hover::before{opacity:1}
.learn-icon{font-size:1.5rem;color:var(--blue);margin-bottom:14px}
.learn-name{font-size:0.9rem;font-weight:700;margin-bottom:8px}
.learn-status{
  display:inline-flex;align-items:center;gap:6px;
  padding:4px 12px;border-radius:100px;font-size:0.68rem;font-weight:600;
}
.status-learning{background:rgba(37,99,235,0.12);border:1px solid rgba(37,99,235,0.2);color:var(--blue)}
.status-building{background:rgba(220,38,38,0.1);border:1px solid rgba(220,38,38,0.2);color:var(--red)}
.status-exploring{background:rgba(255,255,255,0.05);border:1px solid var(--border);color:var(--muted)}
.learn-desc{font-size:0.78rem;color:var(--muted);margin-top:10px;line-height:1.6}

/* =====================================================
   QUOTE
===================================================== */
#quote{
  padding:100px clamp(1.5rem,5vw,4rem);text-align:center;
  background:linear-gradient(180deg,transparent,rgba(37,99,235,0.04) 50%,transparent);
  position:relative;z-index:1;
}
.quote-mark{font-size:5rem;color:rgba(37,99,235,0.15);line-height:1;margin-bottom:-20px;font-family:Georgia,serif}
.quote-text{
  font-size:clamp(1.5rem,3.5vw,2.8rem);font-weight:800;letter-spacing:-0.02em;
  line-height:1.2;max-width:700px;margin:0 auto 16px;
  background:linear-gradient(135deg,#fff,rgba(255,255,255,0.6));
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
}
.quote-attr{font-size:0.82rem;color:var(--muted);letter-spacing:0.1em}

/* =====================================================
   CONTACT
===================================================== */
#contact{padding:120px 0}
.contact-wrap{max-width:720px;margin:0 auto;text-align:center}
.contact-wrap .sec-label{justify-content:center;margin-bottom:14px}
.contact-wrap .sec-label::before{display:none}
.contact-cta{
  font-size:clamp(1.8rem,4vw,3rem);font-weight:800;letter-spacing:-0.02em;
  margin-bottom:14px;line-height:1.15;
}
.contact-cta em{font-style:normal;color:var(--blue)}
.contact-sub{font-size:1rem;color:var(--muted);margin-bottom:48px;line-height:1.7}
.contact-links{display:flex;flex-wrap:wrap;gap:14px;justify-content:center;margin-bottom:56px}
.cl-btn{
  display:inline-flex;align-items:center;gap:9px;
  padding:13px 28px;border-radius:10px;font-size:0.88rem;font-weight:600;
  transition:all 0.3s var(--ease);cursor:none;border:1px solid var(--border);
  background:rgba(255,255,255,0.04);color:var(--text);
}
.cl-btn:hover{background:rgba(255,255,255,0.08);border-color:var(--border2);transform:translateY(-3px)}
.cl-btn.github:hover{border-color:rgba(255,255,255,0.25)}
.cl-btn.instagram:hover{border-color:rgba(225,48,108,0.5);background:rgba(225,48,108,0.08)}
.cl-btn.discord:hover{border-color:rgba(88,101,242,0.5);background:rgba(88,101,242,0.08)}
.cl-btn.email:hover{border-color:rgba(37,99,235,0.5);background:rgba(37,99,235,0.08)}
/* contact form */
.cform{
  background:var(--bg3);border:1px solid var(--border);border-radius:20px;
  padding:36px;text-align:left;margin-top:16px;
}
.cform h3{font-size:1rem;font-weight:700;margin-bottom:24px;color:var(--muted);text-align:center;letter-spacing:0.05em;text-transform:uppercase;font-size:0.78rem}
.cf-row{margin-bottom:16px}
.cf-row label{display:block;font-size:0.72rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:8px}
.cf-row input,.cf-row textarea{
  width:100%;background:rgba(255,255,255,0.03);border:1px solid var(--border);
  border-radius:10px;padding:12px 16px;color:var(--text);font-family:var(--font);
  font-size:0.9rem;transition:all 0.25s;outline:none;resize:none;
}
.cf-row input:focus,.cf-row textarea:focus{border-color:var(--blue);background:rgba(37,99,235,0.05);box-shadow:0 0 0 3px rgba(37,99,235,0.1)}
.cf-row textarea{min-height:110px}
.cf-err{font-size:0.72rem;color:var(--red);margin-top:5px;display:none}
.cf-submit{width:100%;padding:13px;margin-top:8px}

/* =====================================================
   FOOTER
===================================================== */
footer{
  border-top:1px solid var(--border);padding:32px clamp(1.5rem,5vw,4rem);
  display:flex;align-items:center;justify-content:space-between;flex-wrap:gap;gap:12px;
  position:relative;z-index:1;
}
.foot-left{font-size:0.82rem;color:var(--muted)}
.foot-left strong{color:var(--text)}
.foot-right{font-size:0.78rem;color:var(--subtle);font-style:italic}

/* =====================================================
   BACK TO TOP
===================================================== */
#btt{
  position:fixed;bottom:28px;right:28px;width:42px;height:42px;border-radius:50%;
  background:rgba(37,99,235,0.15);border:1px solid rgba(37,99,235,0.3);
  color:var(--blue);font-size:0.85rem;display:flex;align-items:center;justify-content:center;
  transition:all 0.3s;opacity:0;pointer-events:none;z-index:800;cursor:none;
}
#btt.show{opacity:1;pointer-events:auto}
#btt:hover{background:rgba(37,99,235,0.3);transform:translateY(-3px)}

/* =====================================================
   SUCCESS POPUP
===================================================== */
#popup{
  position:fixed;inset:0;background:rgba(0,0,0,0.7);z-index:2000;
  display:flex;align-items:center;justify-content:center;
  opacity:0;visibility:hidden;transition:all 0.3s;
}
#popup.show{opacity:1;visibility:visible}
.popup-box{
  background:var(--bg3);border:1px solid rgba(37,99,235,0.3);border-radius:20px;
  padding:40px;text-align:center;max-width:360px;width:90%;
  transform:scale(0.9);transition:transform 0.3s var(--ease-spring);
  box-shadow:0 0 60px rgba(37,99,235,0.2);
}
#popup.show .popup-box{transform:scale(1)}
.popup-icon{font-size:2.5rem;color:var(--blue);margin-bottom:14px}
.popup-title{font-size:1.2rem;font-weight:700;margin-bottom:8px}
.popup-msg{color:var(--muted);font-size:0.88rem;margin-bottom:24px}
.popup-close{padding:10px 26px;border-radius:8px;background:rgba(37,99,235,0.15);border:1px solid rgba(37,99,235,0.3);color:var(--blue);font-size:0.85rem;font-weight:600;cursor:none;transition:all 0.2s;font-family:var(--font)}
.popup-close:hover{background:rgba(37,99,235,0.3)}

/* =====================================================
   RESPONSIVE
===================================================== */
@media(max-width:900px){
  .about-grid{grid-template-columns:1fr;gap:48px}
  .timeline::before{left:20px}
  .tl-item:nth-child(odd) .tl-content,
  .tl-item:nth-child(even) .tl-content{margin-left:52px;margin-right:0;text-align:left;width:calc(100% - 52px)}
  .tl-node{left:20px}
  .tl-item:nth-child(odd) .tl-content,.tl-item:nth-child(even) .tl-content{transform:translateX(10px)}
}
@media(max-width:768px){
  .nav-links,.nav-cta{display:none}
  .ham{display:flex}
  .proj-grid{grid-template-columns:1fr}
  .contact-links{flex-direction:column;align-items:center}
  .cl-btn{width:100%;max-width:280px;justify-content:center}
  footer{flex-direction:column;text-align:center}
  .hero-btns{flex-direction:column;align-items:center}
  .btn-main{width:100%;max-width:280px;justify-content:center}
  #btt{bottom:20px;right:20px}
  #cur-dot,#cur-ring,#cur-glow{display:none}
  body{cursor:auto}
  button{cursor:pointer}a{cursor:pointer}
}
@media(max-width:480px){
  .skills-grid{grid-template-columns:repeat(2,1fr)}
  .learn-grid{grid-template-columns:1fr 1fr}
}
@media(prefers-reduced-motion:reduce){
  *,*::before,*::after{animation-duration:0.01ms!important;transition-duration:0.01ms!important}
}
</style>
</head>
<body>

<!-- Cursor -->
<div id="cur-dot"></div>
<div id="cur-ring"></div>
<div id="cur-glow"></div>
<!-- Progress -->
<div id="prog"></div>

<!-- CANVAS BG -->
<canvas id="bg-canvas"></canvas>

<!-- NAV -->
<nav id="nav">
  <a href="#home" class="nav-logo">
    <img src="assets/images/dino-logo.jpg" alt="Dino"/>
    <span>n6ble</span>
  </a>
  <div class="nav-links">
    <a href="#about" data-s="about">About</a>
    <a href="#skills" data-s="skills">Skills</a>
    <a href="#projects" data-s="projects">Projects</a>
    <a href="#journey" data-s="journey">Journey</a>
    <a href="#contact" data-s="contact">Contact</a>
  </div>
  <a href="#contact" class="nav-cta btn-main">Let's Talk</a>
  <button class="ham" id="ham" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>

<!-- MOBILE MENU -->
<div class="mob-menu" id="mobMenu">
  <a href="#about"    onclick="closeMenu()">About</a>
  <a href="#skills"   onclick="closeMenu()">Skills</a>
  <a href="#projects" onclick="closeMenu()">Projects</a>
  <a href="#journey"  onclick="closeMenu()">Journey</a>
  <a href="#contact"  onclick="closeMenu()">Contact</a>
</div>

<!-- ===== HERO ===== -->
<section id="home">
  <div class="hero-grid"></div>
  <div class="hero-glow-blue"></div>
  <div class="hero-glow-red"></div>
  <div style="position:relative;z-index:1;width:100%;display:flex;flex-direction:column;align-items:center">
    <div class="hero-status rv d1">
      <div class="status-dot"></div>
      Currently building &amp; learning
    </div>
    <h1 class="hero-name rv d2">Mohammed Moin Hamza</h1>
    <p class="hero-role rv d3">
      <span>Developer</span> &nbsp;•&nbsp; <span>AI Enthusiast</span> &nbsp;•&nbsp; <span>Builder</span>
    </p>
    <p class="hero-tagline rv d4">Turning curiosity into code, ideas into projects, and projects into experiences.</p>
    <div class="hero-btns rv d5">
      <a href="#projects" class="btn-main btn-primary"><i class="fa-solid fa-code-branch"></i> View My Work</a>
      <a href="#contact"  class="btn-main btn-ghost"><i class="fa-solid fa-envelope"></i> Contact Me</a>
    </div>
  </div>
  <div class="hero-scroll">
    <span>Scroll</span>
    <div class="scroll-line"></div>
  </div>
</section>

<!-- ===== ABOUT ===== -->
<section id="about">
  <div class="wrap">
    <div class="about-grid">
      <div class="about-visual rv fl">
        <div class="about-card">
          <img src="assets/images/dino-logo.jpg" alt="Dino" class="about-avatar"/>
          <div class="about-name-tag">Mohammed Moin Hamza</div>
          <div class="about-handles">
            <span class="handle">Dino</span>
            <span class="handle">n6ble</span>
            <span class="handle">zenthorn</span>
          </div>
          <p style="font-size:0.82rem;color:var(--muted);line-height:1.6">Student &mdash; 19 years old<br>Developer from the Discord community</p>
          <div class="about-stat-row">
            <div class="a-stat"><div class="a-stat-n">5+</div><div class="a-stat-l">Languages</div></div>
            <div class="a-stat"><div class="a-stat-n">6+</div><div class="a-stat-l">Projects</div></div>
            <div class="a-stat"><div class="a-stat-n">2+</div><div class="a-stat-l">Years Coding</div></div>
            <div class="a-stat"><div class="a-stat-n">∞</div><div class="a-stat-l">Curiosity</div></div>
          </div>
        </div>
      </div>
      <div class="about-text rv fr">
        <span class="sec-label">About Me</span>
        <h2 class="sec-title">The story<br>behind <em>the code</em></h2>
        <p>It started on <strong>Discord</strong>. Hours spent in communities, managing servers, helping members, discovering bots — that curiosity became a driving force.</p>
        <p>What began as a fascination with how bots work turned into real programming. I started learning <strong>Python</strong>, then <strong>HTML, CSS, JavaScript, PHP</strong> — building websites, automation scripts, AI integrations, and Discord bots.</p>
        <p>Today I focus on <strong>AI, machine learning, web development</strong>, and building things that actually work. Every project is a chance to learn something new and push further.</p>
        <div class="about-origin">
          <p>"I didn't start with a roadmap. I started with Discord, curiosity, and a lot of questions. The code came later — and it never stopped."</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== SKILLS ===== -->
<section id="skills">
  <div class="wrap">
    <div class="skills-header rv">
      <span class="sec-label">Tech Stack</span>
      <h2 class="sec-title">What I <em>work with</em></h2>
      <p class="sec-sub">Languages, tools, and technologies I use to build things.</p>
    </div>
    <?php
    $skills=[
      ['fa-brands fa-python','Python','Primary language'],
      ['fa-brands fa-js','JavaScript','Web interactivity'],
      ['fa-brands fa-html5','HTML','Structure & markup'],
      ['fa-brands fa-css3-alt','CSS','Styling & layout'],
      ['fa-brands fa-php','PHP','Backend & APIs'],
      ['fa-solid fa-brain','AI / ML','Integrations & models'],
      ['fa-brands fa-discord','Discord Bots','discord.py & API'],
      ['fa-solid fa-plug','API Integration','REST & webhooks'],
      ['fa-solid fa-gears','Automation','Scripts & tools'],
      ['fa-solid fa-globe','Web Dev','Full-stack builds'],
    ];
    ?>
    <div class="skills-grid">
      <?php foreach($skills as $i=>[$ico,$name,$sub]):?>
      <div class="sk-card rv" style="transition-delay:<?=($i%5)*0.07?>s">
        <div class="sk-icon"><i class="<?=$ico?>"></i></div>
        <div class="sk-name"><?=$name?></div>
        <div class="sk-tag"><?=$sub?></div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- ===== PROJECTS ===== -->
<section id="projects">
  <div class="wrap">
    <div class="proj-header rv">
      <span class="sec-label">Projects</span>
      <h2 class="sec-title">Things I've <em>built</em></h2>
      <p class="sec-sub">A selection of projects — bots, web apps, AI tools, and experiments.</p>
    </div>
    <?php
    $projects=[
      ['Franky — Discord Bot','A multifunctional Discord bot featuring moderation, utilities, fun commands, AI integration, music, interactive controls, and server management tools.',['Python','discord.py','Groq AI','Gemini'],'fa-brands fa-discord',null,'featured'],
      ['AI Chat Platform','A ChatGPT-style web interface connected to modern LLM APIs featuring a clean conversational UI, streaming responses, and conversation history.',['PHP','Groq API','JavaScript','CSS'],null,null,''],
      ['Loyal Bot','A feature-rich multi-cog Discord bot with moderation, economy, leveling, and AI-powered chat commands.',['Python','discord.py','API'],null,'assets/images/loyal-logo.png',''],
      ['AI Web Tools','A collection of AI-powered web experiments and tools using modern AI APIs for practical use cases.',['JavaScript','Python','APIs','CSS'],'fa-solid fa-wand-magic-sparkles',null,''],
      ['Image Editing Tool','A browser-based image editor with AI-powered enhancement, background removal, filters, and creative features.',['JavaScript','Canvas API','AI'],'fa-solid fa-image',null,''],
      ['Discord Automation','Scripts and utilities for Discord monitoring, notifications, server management, and workflow automation.',['Python','REST API','Automation'],'fa-solid fa-gears',null,''],
    ];
    ?>
    <div class="proj-grid">
      <?php foreach($projects as $i=>[$title,$desc,$tags,$ico,$logo,$feat]):?>
      <div class="proj-card rv" style="transition-delay:<?=($i%3)*0.1?>s">
        <div class="proj-thumb">
          <?php if($logo):?><img src="<?=$logo?>" class="proj-thumb-logo" alt="<?=htmlspecialchars($title)?>"/>
          <?php else:?><i class="<?=$ico?>"></i><?php endif;?>
          <?php if($feat):?><div class="proj-featured">Featured</div><?php endif;?>
        </div>
        <div class="proj-body">
          <h3 class="proj-title"><?=htmlspecialchars($title)?></h3>
          <p class="proj-desc"><?=htmlspecialchars($desc)?></p>
          <div class="proj-tech">
            <?php foreach($tags as $t):?><span class="tech-tag"><?=htmlspecialchars($t)?></span><?php endforeach;?>
          </div>
          <div class="proj-links">
            <a href="https://github.com/moinhamza" target="_blank" class="proj-btn primary"><i class="fa-brands fa-github"></i> View</a>
            <a href="https://github.com/moinhamza" target="_blank" class="proj-btn ghost"><i class="fa-solid fa-arrow-up-right-from-square"></i> GitHub</a>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- ===== JOURNEY ===== -->
<section id="journey">
  <div class="wrap">
    <div class="journey-header rv">
      <span class="sec-label">Journey</span>
      <h2 class="sec-title">How it <em>started</em></h2>
      <p class="sec-sub" style="margin:0 auto;text-align:center">The path from Discord communities to building real projects.</p>
    </div>
    <div class="timeline">
      <?php
      $tl=[
        ['Origin','Discord Communities','Spending hours in servers, discovering communities and how they work.'],
        ['Spark','Curiosity Ignites','Questions about how bots work triggered a drive to understand code.'],
        ['First Steps','Coding Experiments','Writing first scripts, breaking things, learning by doing.'],
        ['Language','Python','Chose Python as the primary tool. Built automation and bot scripts.'],
        ['Web','HTML & CSS','Moved into the web. Built first pages, learned structure and style.'],
        ['Backend','JavaScript & PHP','Added interactivity and backend logic to web projects.'],
        ['Bots','Discord Bot Dev','Built full Discord bots with moderation, AI, music, and commands.'],
        ['APIs','AI & Integrations','Integrated Groq, Gemini, and other APIs into real applications.'],
        ['Now','Bigger Projects','Building larger, more complex projects across AI and web dev.'],
      ];
      foreach($tl as $i=>[$step,$title,$desc]):?>
      <div class="tl-item">
        <div class="tl-node"></div>
        <div class="tl-content">
          <div class="tl-card">
            <div class="tl-step"><?=htmlspecialchars($step)?></div>
            <div class="tl-title"><?=htmlspecialchars($title)?></div>
            <div class="tl-desc"><?=htmlspecialchars($desc)?></div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- ===== LEARNING ===== -->
<section id="learning">
  <div class="wrap">
    <div class="learn-header rv">
      <span class="sec-label">Currently</span>
      <h2 class="sec-title">Always <em>learning</em></h2>
      <p class="sec-sub" style="margin:0 auto;text-align:center">Areas I'm actively exploring, building, and diving deeper into.</p>
    </div>
    <?php
    $learning=[
      ['fa-brands fa-python','Python','Learning','Advancing into data structures, algorithms, and complex applications.'],
      ['fa-solid fa-chart-line','Data Science','Exploring','Working through data analysis, visualization, and pandas/numpy.'],
      ['fa-solid fa-brain','Machine Learning','Learning','Neural networks, model training, and practical ML applications.'],
      ['fa-solid fa-robot','AI & LLMs','Building','Integrating large language models into real projects and tools.'],
      ['fa-solid fa-globe','Advanced Web Dev','Building','Complex full-stack projects, APIs, and modern web patterns.'],
      ['fa-solid fa-plug','APIs & Automation','Building','Connecting systems, building pipelines, and automating workflows.'],
    ];
    ?>
    <div class="learn-grid">
      <?php foreach($learning as $i=>[$ico,$name,$status,$desc]):?>
      <div class="learn-card rv" style="transition-delay:<?=($i%3)*0.08?>s">
        <div class="learn-icon"><i class="<?=$ico?>"></i></div>
        <div class="learn-name"><?=$name?></div>
        <span class="learn-status status-<?=strtolower($status)?>"><?=$status?></span>
        <p class="learn-desc"><?=$desc?></p>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- ===== QUOTE ===== -->
<section id="quote">
  <div class="rv">
    <div class="quote-mark">"</div>
    <p class="quote-text">Don't just use technology. Build with it.</p>
    <p class="quote-attr">— Mohammed Moin Hamza</p>
  </div>
</section>

<!-- ===== CONTACT ===== -->
<section id="contact">
  <div class="wrap">
    <div class="contact-wrap">
      <div class="rv">
        <span class="sec-label">Contact</span>
        <h2 class="contact-cta">Have an idea<br>worth <em>building?</em></h2>
        <p class="contact-sub">Let's turn the idea into something real.</p>
      </div>
      <div class="contact-links rv d2">
        <a href="https://github.com/moinhamza" target="_blank" class="cl-btn github"><i class="fa-brands fa-github"></i> GitHub</a>
        <a href="https://discord.com" target="_blank" class="cl-btn discord"><i class="fa-brands fa-discord"></i> Discord</a>
        <a href="https://www.instagram.com/epichamzax" target="_blank" class="cl-btn instagram"><i class="fa-brands fa-instagram"></i> Instagram</a>
        <a href="mailto:moinhamza32@gmail.com" class="cl-btn email"><i class="fa-solid fa-envelope"></i> Email</a>
      </div>
      <div class="cform rv d3">
        <h3>Or send a direct message</h3>
        <form id="cf" novalidate>
          <div class="cf-row">
            <label>Name</label>
            <input type="text" name="name" placeholder="Your name" required/>
            <span class="cf-err"></span>
          </div>
          <div class="cf-row">
            <label>Email</label>
            <input type="email" name="email" placeholder="your@email.com" required/>
            <span class="cf-err"></span>
          </div>
          <div class="cf-row">
            <label>Message</label>
            <textarea name="message" placeholder="Tell me about the idea..." required></textarea>
            <span class="cf-err"></span>
          </div>
          <button type="submit" class="btn-main btn-primary cf-submit"><i class="fa-solid fa-paper-plane"></i> Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="foot-left">
    &copy; <?=date('Y')?> <strong>Mohammed Moin Hamza</strong> &nbsp;&mdash;&nbsp; Dino &nbsp;/&nbsp; n6ble
  </div>
  <div class="foot-right">Built with curiosity and code.</div>
</footer>

<!-- Back to top -->
<button id="btt" aria-label="Back to top"><i class="fa-solid fa-chevron-up"></i></button>

<!-- Popup -->
<div id="popup">
  <div class="popup-box">
    <div class="popup-icon"><i class="fa-solid fa-circle-check"></i></div>
    <h3 class="popup-title">Message Sent</h3>
    <p class="popup-msg">Thanks for reaching out. I'll get back to you soon.</p>
    <button class="popup-close" id="popclose">Close</button>
  </div>
</div>

<script>
/* ===== CURSOR ===== */
const dot=document.getElementById('cur-dot'),ring=document.getElementById('cur-ring'),glow=document.getElementById('cur-glow');
let mx=0,my=0,rx=0,ry=0,gx=0,gy=0;
if(dot&&ring){
  document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY});
  (function ani(){
    rx+=(mx-rx)*0.14;ry+=(my-ry)*0.14;
    gx+=(mx-gx)*0.06;gy+=(my-gy)*0.06;
    dot.style.left=mx+'px';dot.style.top=my+'px';
    ring.style.left=rx+'px';ring.style.top=ry+'px';
    if(glow){glow.style.left=gx+'px';glow.style.top=gy+'px'}
    requestAnimationFrame(ani);
  })();
  document.querySelectorAll('a,button,.sk-card,.proj-card,.learn-card,.tl-card').forEach(el=>{
    el.addEventListener('mouseenter',()=>ring.classList.add('expand'));
    el.addEventListener('mouseleave',()=>ring.classList.remove('expand'));
  });
}

/* ===== SCROLL PROGRESS ===== */
const prog=document.getElementById('prog');
window.addEventListener('scroll',()=>{
  prog.style.width=(scrollY/(document.body.scrollHeight-innerHeight)*100)+'%';
},{passive:true});

/* ===== NAV STUCK ===== */
const nav=document.getElementById('nav');
const navAs=document.querySelectorAll('[data-s]');
window.addEventListener('scroll',()=>{
  nav.classList.toggle('stuck',scrollY>30);
},{passive:true});
// Active nav
document.querySelectorAll('section[id]').forEach(s=>{
  new IntersectionObserver(es=>es.forEach(e=>{
    if(e.isIntersecting)navAs.forEach(n=>n.classList.toggle('on',n.dataset.s===e.target.id));
  }),{threshold:0.4}).observe(s);
});

/* ===== HAMBURGER ===== */
const ham=document.getElementById('ham'),mob=document.getElementById('mobMenu');
ham.addEventListener('click',()=>{ham.classList.toggle('on');mob.classList.toggle('on')});
function closeMenu(){ham.classList.remove('on');mob.classList.remove('on')}

/* ===== REVEAL ===== */
new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('vis')}),{threshold:0.1})
  .observe&&document.querySelectorAll('.rv,.tl-content').forEach(el=>{
    new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('vis')}),{threshold:0.1}).observe(el);
  });

/* ===== BACK TO TOP ===== */
const btt=document.getElementById('btt');
window.addEventListener('scroll',()=>btt.classList.toggle('show',scrollY>500),{passive:true});
btt.addEventListener('click',()=>scrollTo({top:0,behavior:'smooth'}));

/* ===== CANVAS BG — particle grid ===== */
(function(){
  const cv=document.getElementById('bg-canvas'),ctx=cv.getContext('2d');
  let W,H,pts=[];
  function rsz(){W=cv.width=innerWidth;H=cv.height=innerHeight}rsz();
  window.addEventListener('resize',rsz);
  for(let i=0;i<50;i++)pts.push({
    x:Math.random()*1920,y:Math.random()*1080,
    vx:(Math.random()-.5)*.25,vy:(Math.random()-.5)*.25,
    r:Math.random()*1.5+.3,a:Math.random()*.4+.1,
    c:Math.random()>.5?'#2563EB':'#DC2626'
  });
  let mx2=-999,my2=-999;
  document.addEventListener('mousemove',e=>{mx2=e.clientX;my2=e.clientY});
  (function frame(){
    ctx.clearRect(0,0,W,H);
    // grid
    ctx.save();ctx.strokeStyle='rgba(255,255,255,0.025)';ctx.lineWidth=.5;
    for(let x=0;x<W;x+=70){ctx.beginPath();ctx.moveTo(x,0);ctx.lineTo(x,H);ctx.stroke()}
    for(let y=0;y<H;y+=70){ctx.beginPath();ctx.moveTo(0,y);ctx.lineTo(W,y);ctx.stroke()}
    ctx.restore();
    // mouse glow
    const g=ctx.createRadialGradient(mx2,my2,0,mx2,my2,200);
    g.addColorStop(0,'rgba(37,99,235,0.05)');g.addColorStop(1,'transparent');
    ctx.fillStyle=g;ctx.fillRect(0,0,W,H);
    // particles
    pts.forEach(p=>{
      p.x+=p.vx;p.y+=p.vy;
      if(p.x<0)p.x=W;if(p.x>W)p.x=0;
      if(p.y<0)p.y=H;if(p.y>H)p.y=0;
      ctx.save();ctx.globalAlpha=p.a;ctx.fillStyle=p.c;
      ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);ctx.fill();ctx.restore();
      pts.forEach(q=>{
        const d=Math.hypot(p.x-q.x,p.y-q.y);
        if(d<110){ctx.save();ctx.globalAlpha=(1-d/110)*.05;ctx.strokeStyle='#2563EB';ctx.lineWidth=.4;ctx.beginPath();ctx.moveTo(p.x,p.y);ctx.lineTo(q.x,q.y);ctx.stroke();ctx.restore()}
      });
    });
    requestAnimationFrame(frame);
  })();
})();

/* ===== MAGNETIC BUTTONS ===== */
document.querySelectorAll('.btn-main,.cl-btn').forEach(btn=>{
  btn.addEventListener('mousemove',e=>{
    const r=btn.getBoundingClientRect();
    const x=(e.clientX-r.left-r.width/2)*0.25;
    const y=(e.clientY-r.top-r.height/2)*0.25;
    btn.style.transform=`translate(${x}px,${y}px) translateY(-2px)`;
  });
  btn.addEventListener('mouseleave',()=>btn.style.transform='');
});

/* ===== CONTACT FORM ===== */
document.getElementById('cf').addEventListener('submit',async e=>{
  e.preventDefault();let ok=true;
  e.target.querySelectorAll('[required]').forEach(f=>{
    const er=f.nextElementSibling;
    if(!f.value.trim()){er.style.display='block';er.textContent='This field is required.';ok=false}
    else er.style.display='none';
  });
  const ef=e.target.querySelector('[name="email"]');
  if(ef&&ef.value&&!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(ef.value)){
    ef.nextElementSibling.style.display='block';ef.nextElementSibling.textContent='Invalid email.';ok=false;
  }
  if(!ok)return;
  const sb=e.target.querySelector('.cf-submit');
  sb.disabled=true;sb.innerHTML='<i class="fa-solid fa-spinner fa-spin"></i> Sending...';
  try{
    const r=await fetch('api/contact.php',{method:'POST',body:new FormData(e.target)});
    const j=await r.json();
    if(j.success){document.getElementById('popup').classList.add('show');e.target.reset()}
    else alert('Something went wrong. Please try again.');
  }catch{alert('Network error.')}
  finally{sb.disabled=false;sb.innerHTML='<i class="fa-solid fa-paper-plane"></i> Send Message'}
});
document.getElementById('popclose').addEventListener('click',()=>document.getElementById('popup').classList.remove('show'));

/* ===== RIPPLE ===== */
document.querySelectorAll('.btn-main,.popup-close,.proj-btn,.cl-btn').forEach(b=>{
  b.addEventListener('click',e=>{
    const s=document.createElement('span');
    s.style.cssText='position:absolute;border-radius:50%;background:rgba(255,255,255,0.15);transform:scale(0);animation:rp .6s linear;pointer-events:none;width:80px;height:80px;';
    const r=b.getBoundingClientRect();
    s.style.left=(e.clientX-r.left-40)+'px';s.style.top=(e.clientY-r.top-40)+'px';
    b.style.position='relative';b.style.overflow='hidden';
    b.appendChild(s);setTimeout(()=>s.remove(),700);
  });
});
const st=document.createElement('style');st.textContent='@keyframes rp{to{transform:scale(4);opacity:0}}';document.head.appendChild(st);
</script>
</body>
</html>
