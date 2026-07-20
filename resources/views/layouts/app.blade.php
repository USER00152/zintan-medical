<!DOCTYPE html>
<html lang="ar" dir="rtl" id="html-root">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}

:root{
  --p:#B2DDB8;--pd:#8FBF96;--pdd:#6A9E75;
  --pl:#EEF8F0;--pll:#F6FCF7;
  --td:#1a2e22;--tm:#6b8f7a;--tl:#a8c4b0;
  --bg:#F8FBF8;--card:#fff;--bdr:#D8EDD8;--bds:#EAF3EA;
  --ok:#22a55e;--ac:#f0a93a;--err:#e74c3c;
  --r8:8px;--r14:14px;--r22:22px;--rF:999px;
  --s1:0 2px 10px rgba(178,221,184,.15);
  --s2:0 8px 28px rgba(178,221,184,.25);
  --s3:0 20px 52px rgba(178,221,184,.3);
  --sp:0 8px 28px rgba(142,191,150,.4);
  --font:'Tajawal',sans-serif;
  --max-w:1280px;
  --side-pad:40px;
}

[data-theme="dark"]{
  --p:#9B85CC;--pd:#7B65AC;--pdd:#5B459C;
  --pl:#2D2040;--pll:#231830;
  --td:#E8E0F0;--tm:#9B8AB0;--tl:#6B5A80;
  --bg:#1A1225;--card:#231830;--bdr:#3D2D55;--bds:#2D2040;
  --s1:0 2px 10px rgba(155,133,204,.2);
  --s2:0 8px 28px rgba(155,133,204,.3);
  --sp:0 8px 28px rgba(155,133,204,.5);
}
[data-theme="dark"] .nav{background:rgba(35,24,48,.97);border-color:#3D2D55}
[data-theme="dark"] .nav-book-bar{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] .mob-tabs-bar{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .footer{background:linear-gradient(160deg,#130D1E,#231830)}
[data-theme="dark"] .sp-card,[data-theme="dark"] .dc,[data-theme="dark"] .fc,
[data-theme="dark"] .ph-card,[data-theme="dark"] .dl-card,[data-theme="dark"] .apt-card,
[data-theme="dark"] .book-card,[data-theme="dark"] .fp,[data-theme="dark"] .doc-list,
[data-theme="dark"] .chat-area,[data-theme="dark"] .ph-card-big,[data-theme="dark"] .sd-card,
[data-theme="dark"] .svc-card,[data-theme="dark"] .partner-card{background:#231830;border-color:#3D2D55}
[data-theme="dark"] .hbadge,[data-theme="dark"] .msg-dr{background:#2D2040;border-color:#3D2D55}
[data-theme="dark"] input,[data-theme="dark"] select,[data-theme="dark"] textarea{background:#2D2040!important;color:var(--td)!important;border-color:#3D2D55!important}

body{font-family:var(--font);direction:rtl;background:var(--bg);color:var(--td);overflow-x:hidden;width:100%;font-size:15px;line-height:1.6}

.btn{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;border-radius:var(--rF);font-weight:700;font-size:15px;border:2px solid transparent;font-family:var(--font);cursor:pointer;transition:.25s;text-decoration:none;white-space:nowrap}
.bp{background:var(--p);color:#fff;box-shadow:var(--sp)}.bp:hover{background:var(--pd);transform:translateY(-2px)}
.bo{background:var(--card);color:var(--p);border-color:var(--bdr)}.bo:hover{border-color:var(--p);background:var(--pl)}
.bsm{padding:9px 18px;font-size:13px}

/* ══ NAVBAR ══ */
.nav{background:rgba(255,255,255,.97);backdrop-filter:blur(14px);border-bottom:1px solid var(--bds);position:sticky;top:0;z-index:200;width:100%}
.nav-inner{max-width:var(--max-w);margin:0 auto;padding:0 var(--side-pad)}
.nav-top{display:flex;align-items:center;justify-content:space-between;width:100%;height:60px}
.logo{display:flex;align-items:center;gap:10px;text-decoration:none;flex-shrink:0}
.lm{width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:var(--sp);flex-shrink:0}
.lm svg{width:22px;height:22px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.ln{font-size:17px;font-weight:900;color:var(--td)}.ln span{color:var(--p)}
.ls{font-size:11px;color:var(--tm)}
.nav-right{display:flex;align-items:center;gap:8px;flex-shrink:0}
.icon-btn{width:38px;height:38px;border-radius:50%;background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;flex-shrink:0}
.icon-btn svg{width:17px;height:17px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.lang-btn{height:36px;padding:0 14px;border-radius:var(--rF);background:var(--pl);border:1.5px solid var(--bdr);display:flex;align-items:center;gap:6px;cursor:pointer;font-size:12px;font-weight:800;color:var(--p);font-family:var(--font);white-space:nowrap}
.lang-btn svg{width:14px;height:14px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round}
.uav{width:38px;height:38px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:800;border:2px solid var(--pl);flex-shrink:0;cursor:pointer}

/* ══ TABS ROW — يمتد على العرض الكامل ══ */
.nav-tabs-wrap{border-top:1px solid var(--bds);width:100%}
.nav-tabs{display:flex;width:100%;height:46px;align-items:stretch;max-width:var(--max-w);margin:0 auto;padding:0 var(--side-pad)}
.nt{flex:1;display:inline-flex;align-items:center;justify-content:center;padding:0 8px;border-radius:var(--rF);font-weight:700;font-size:14px;color:var(--tm);border:none;background:none;font-family:var(--font);cursor:pointer;transition:.2s;text-decoration:none;white-space:nowrap;text-align:center}
.nt:hover,.nt.on{color:var(--p);background:var(--pl)}
.nt.bk{background:var(--p);color:#fff;border-radius:var(--rF)}.nt.bk:hover{background:var(--pd)}

/* ══ شريط الحجز تحت التبويبات — لابتوب فقط ══ */
.nav-book-bar{
  width:100%;
  background:linear-gradient(135deg,var(--pll),var(--pl));
  border-bottom:1.5px solid var(--bdr);
  padding:10px var(--side-pad);
  display:flex;
  align-items:center;
  justify-content:center;
}
.nav-book-bar-inner{
  max-width:var(--max-w);
  width:100%;
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:20px;
}
.nav-book-bar-text{
  display:flex;
  align-items:center;
  gap:10px;
  font-size:14px;
  color:var(--tm);
  font-weight:600;
}
.nav-book-bar-text svg{width:18px;height:18px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round;flex-shrink:0}

/* ══ MOBILE TABS BAR ══ */
.mob-tabs-bar{display:none;background:var(--card);border-bottom:1.5px solid var(--bds);padding:0 12px;overflow-x:auto;scrollbar-width:none;-webkit-overflow-scrolling:touch;position:sticky;top:60px;z-index:198;gap:4px;width:100%;height:44px;align-items:center}
.mob-tabs-bar::-webkit-scrollbar{display:none}
.mob-t{padding:6px 14px;border-radius:var(--rF);font-size:12px;font-weight:700;color:var(--tm);white-space:nowrap;border:none;background:none;font-family:var(--font);cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;transition:.2s;flex-shrink:0}
.mob-t:hover,.mob-t.on{color:var(--p);background:var(--pl)}
.mob-t.bk{background:var(--p);color:#fff}

/* ══ PAGE HEADER ══ */
.pg-hd{background:linear-gradient(180deg,var(--pll),var(--bg));padding:28px var(--side-pad) 22px;border-bottom:1px solid var(--bds);width:100%}
.pg-hd-inner{max-width:var(--max-w);margin:0 auto}
.bc{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--tm);margin-bottom:8px;font-weight:600}
.cur{color:var(--p)}
.pg-hd h1{font-size:26px;margin-bottom:4px;color:var(--td);font-weight:800}
.pg-hd p{color:var(--tm);font-size:14px}

.si{max-width:var(--max-w);margin:0 auto;width:100%;padding:0 var(--side-pad)}

.iw{position:relative}
.iw input,.iw select{width:100%;padding:13px 13px 13px 44px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:15px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.iw input:focus,.iw select:focus{outline:none;border-color:var(--p);background:var(--card)}
.iw-ic{position:absolute;top:50%;left:13px;transform:translateY(-50%);color:var(--tl);pointer-events:none}
.iw-ic svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}

.sec{padding:60px var(--side-pad)}

.sh{text-align:center;margin-bottom:44px}
.eyebrow{display:inline-flex;background:var(--pl);color:var(--p);font-weight:700;font-size:13px;padding:8px 20px;border-radius:var(--rF);margin-bottom:14px;border:1px solid rgba(90,174,122,.2)}
.sh h2{font-size:32px;font-weight:800;color:var(--td);margin-bottom:10px}
.sh p{font-size:15px;color:var(--tm);line-height:1.7;max-width:600px;margin:0 auto}

.sp-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.doc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
.feat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.ph-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}

.sp-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:26px 16px;text-align:center;transition:.25s;cursor:pointer}
.sp-card:hover{border-color:var(--p);box-shadow:var(--s2);transform:translateY(-4px)}
.sp-ico{width:60px;height:60px;margin:0 auto 14px;border-radius:18px;background:var(--pl);display:flex;align-items:center;justify-content:center;transition:.25s}
.sp-ico svg{width:30px;height:30px;fill:none;stroke:var(--p);stroke-width:1.8;stroke-linecap:round;transition:.25s}
.sp-card:hover .sp-ico{background:var(--p)}.sp-card:hover .sp-ico svg{stroke:#fff}
.sp-card h4{font-size:14.5px;font-weight:700;color:var(--td);margin-bottom:4px}
.sp-card span{font-size:12px;color:var(--tm)}

.dc{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden;transition:.25s}
.dc:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-3px)}
.dc-cov{height:100px;background:linear-gradient(120deg,var(--pll),#d9f0e0);position:relative}
.dc-pat{position:absolute;inset:0;opacity:.1;background-image:radial-gradient(circle,var(--p) 1px,transparent 1px);background-size:14px 14px}
.dc-av{width:68px;height:68px;border-radius:50%;border:4px solid var(--card);background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:22px;font-weight:800;position:absolute;bottom:-34px;right:18px;box-shadow:var(--s1)}
.dc-body{padding:42px 18px 18px}
.dc-body h3{font-size:16px;color:var(--td);font-weight:800;margin-bottom:4px}
.dspec{color:var(--p);font-weight:700;font-size:12px;display:inline-block;background:var(--pl);padding:4px 10px;border-radius:var(--rF);margin-bottom:8px}
.dc-meta{font-size:12px;color:var(--tm);margin-bottom:6px}
.dc-clin{font-size:12px;color:var(--tm)}
.dc-clin b{color:var(--p);display:block;font-size:12px;margin-top:1px}
.dc-foot{display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1.5px dashed var(--bds);margin-top:12px}
.stars{color:#f0a93a;font-size:13px}

.fc{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:28px;display:flex;gap:18px;transition:.25s}
.fc:hover{box-shadow:var(--s2);border-color:var(--p)}
.fc-ico{width:52px;height:52px;border-radius:15px;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:.25s}
.fc-ico svg{width:26px;height:26px;fill:none;stroke:var(--p);stroke-width:1.8;stroke-linecap:round;transition:.25s}
.fc:hover .fc-ico{background:var(--p)}.fc:hover .fc-ico svg{stroke:#fff}
.fc h4{font-size:15px;font-weight:800;color:var(--td);margin-bottom:6px}
.fc p{font-size:13.5px;color:var(--tm);line-height:1.7}

.ph-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:20px;display:flex;align-items:center;gap:16px;transition:.25s;cursor:pointer}
.ph-card:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-3px)}
.ph-ico{width:54px;height:54px;border-radius:16px;background:var(--pl);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ph-ico svg{width:26px;height:26px;fill:none;stroke:var(--p);stroke-width:1.8;stroke-linecap:round}
.ph-name{font-size:15px;font-weight:800;color:var(--td);margin-bottom:4px}
.ph-addr{font-size:12.5px;color:var(--tm)}
.ph-open{font-size:12px;font-weight:700;margin-top:4px}

.doc-page-grid{display:grid;grid-template-columns:280px 1fr;gap:24px;align-items:start}
.fp{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:22px;position:sticky;top:120px}
.fp h3{font-size:15px;margin-bottom:16px;display:flex;align-items:center;justify-content:space-between;color:var(--td);font-weight:800}
.clr{font-size:12px;color:var(--p);font-weight:700;cursor:pointer}
.fg2{margin-bottom:20px}
.fg2 h4{font-size:13px;color:var(--td);margin-bottom:12px;font-weight:700}
.fo{display:flex;align-items:center;justify-content:space-between;padding:8px 0;border-bottom:1px solid var(--bds)}
.fo label{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--td);cursor:pointer;font-weight:600}
.cnt{font-size:11.5px;background:var(--pl);color:var(--p);padding:2px 8px;border-radius:var(--rF);font-weight:700}
.dl-grid{display:flex;flex-direction:column;gap:14px}
.dl-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r14);padding:18px 22px;display:flex;align-items:center;gap:16px;transition:.25s}
.dl-card:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-2px)}
.dav{width:62px;height:62px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:800;flex-shrink:0;border:3px solid var(--pl)}
.di{flex:1}
.di h3{font-size:16px;color:var(--td);font-weight:800;margin-bottom:4px}
.dmeta{display:flex;gap:14px;font-size:12.5px;color:var(--tm);font-weight:600;margin:5px 0}
.dclin{font-size:12.5px;color:var(--tm)}
.dclin b{color:var(--p);display:block;font-size:12.5px;margin-top:2px}
.res-bar{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
.res-cnt{font-size:15px;font-weight:700;color:var(--td)}
.res-cnt span{color:var(--p)}
.srt select{border:1.5px solid var(--bdr);border-radius:var(--rF);padding:7px 14px;font-size:13px;color:var(--td);background:var(--card);font-family:var(--font)}

.sp-grid2{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:44px}
.sp-docs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:20px}
.sd-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden;transition:.25s}
.sd-card:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-3px)}
.sd-cov{height:90px;background:linear-gradient(120deg,var(--pll),#d9f0e0);position:relative}
.sd-pat{position:absolute;inset:0;opacity:.1;background-image:radial-gradient(circle,var(--p) 1px,transparent 1px);background-size:14px 14px}
.sd-av{width:64px;height:64px;border-radius:50%;border:4px solid var(--card);background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:800;position:absolute;bottom:-32px;right:18px;box-shadow:var(--s1)}
.sd-body{padding:40px 16px 16px}
.sd-body h3{font-size:15px;color:var(--td);font-weight:800;margin-bottom:4px}
.sd-clin{font-size:12px;color:var(--tm);margin-bottom:8px}
.sd-clin b{color:var(--p);display:block;margin-top:2px}
.sd-foot{display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1.5px dashed var(--bds)}

.svc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:28px}
.svc-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:24px;padding:36px;transition:.25s;position:relative;overflow:hidden}
.svc-card:hover{transform:translateY(-6px);box-shadow:0 16px 40px rgba(178,221,184,.3);border-color:var(--p)}
.svc-card-featured{background:linear-gradient(160deg,var(--pdd),var(--p));border:none;transform:translateY(-8px);box-shadow:0 20px 50px rgba(106,158,117,.35)}
.svc-card-featured:hover{transform:translateY(-14px)}
.svc-blob{position:absolute;border-radius:50%;background:var(--pl);opacity:.5}
.svc-blob-featured{background:rgba(255,255,255,.08);opacity:1}
.svc-icon{width:72px;height:72px;border-radius:22px;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;margin-bottom:22px;box-shadow:var(--sp);position:relative}
.svc-icon-featured{background:rgba(255,255,255,.2);box-shadow:none;border:1.5px solid rgba(255,255,255,.3)}
.svc-badge{display:inline-flex;background:var(--pl);color:var(--p);font-size:12px;font-weight:700;padding:4px 14px;border-radius:999px;margin-bottom:14px}
.svc-badge-featured{background:rgba(255,255,255,.2);color:#fff}
.svc-feat-item{display:flex;align-items:center;gap:10px;font-size:13.5px;font-weight:600}

.partner-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-bottom:36px}
.partner-card{background:var(--bg);border:1.5px solid var(--bdr);border-radius:20px;padding:32px;text-align:center;transition:.25s}
.partner-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(178,221,184,.2);border-color:var(--p)}
.partner-card-featured{background:linear-gradient(160deg,var(--pdd),var(--p));border:none;box-shadow:0 16px 40px rgba(106,158,117,.3)}

.highlight-pulse{animation:highlightPop .8s ease-out}
@keyframes highlightPop{0%{box-shadow:0 0 0 0 rgba(90,174,122,.5)}60%{box-shadow:0 0 0 12px rgba(90,174,122,.1)}100%{box-shadow:0 0 0 0 rgba(90,174,122,0)}}

.footer{background:linear-gradient(160deg,var(--pdd),var(--pd));color:#fff;padding:52px var(--side-pad) 0;width:100%}
.fg-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:28px;max-width:var(--max-w);margin:0 auto 28px}
.fg-col h4{font-size:14px;font-weight:800;color:rgba(255,255,255,.95);margin-bottom:12px}
.fg-col p,.fg-col li{font-size:13px;color:rgba(255,255,255,.65);line-height:2;list-style:none}
.foot-bot{border-top:1px solid rgba(255,255,255,.12);padding:16px 0;display:flex;align-items:center;justify-content:space-between;max-width:var(--max-w);margin:0 auto;font-size:12.5px;color:rgba(255,255,255,.45);flex-wrap:wrap;gap:8px}
.loading-state{text-align:center;padding:48px;color:var(--tm);font-size:15px}

/* ══ RESPONSIVE ══ */
@media(min-width:1400px){
  :root{--max-w:1360px;--side-pad:48px}
}
@media(max-width:1200px){
  :root{--max-w:100%;--side-pad:32px}
}

/* تابلت */
@media(max-width:900px){
  :root{--side-pad:20px}
  .nav-tabs-wrap{display:none}
  .nav-book-bar{display:none}
  .mob-tabs-bar{display:flex}
  .fg-grid{grid-template-columns:1fr 1fr}
  .doc-page-grid{grid-template-columns:1fr}
  .fp{position:static}
  .sp-grid{grid-template-columns:repeat(3,1fr)}
  .sp-grid2{grid-template-columns:repeat(3,1fr)}
  .doc-grid{grid-template-columns:repeat(2,1fr)}
  .feat-grid{grid-template-columns:repeat(2,1fr)}
  .ph-grid{grid-template-columns:repeat(2,1fr)}
  .svc-grid{grid-template-columns:repeat(2,1fr)}
  .svc-card-featured{transform:none}
  .partner-grid{grid-template-columns:repeat(2,1fr)}
  .sp-docs-grid{grid-template-columns:repeat(2,1fr)}
}

/* موبايل */
@media(max-width:640px){
  :root{--side-pad:14px}
  .nav-inner{padding:0 14px}
  .ls{display:none}
  .ln{font-size:14px}
  .lm{width:36px;height:36px}
  .icon-btn{width:34px;height:34px}.icon-btn svg{width:15px;height:15px}
  .uav{width:34px;height:34px;font-size:12px}
  .lang-btn{height:32px;padding:0 10px;font-size:11px}
  .mob-tabs-bar{top:60px;padding:0 10px}
  .mob-t{font-size:11.5px;padding:5px 11px}
  .pg-hd{padding:18px 14px}
  .sec{padding:28px 14px}
  .footer{padding:36px 14px 0}
  .sh h2{font-size:24px}
  .sh p{font-size:14px}
  .eyebrow{font-size:12px;padding:6px 16px}

  .hero{padding:22px 14px 32px!important}
  .hero-in{display:flex!important;flex-direction:column!important;gap:18px!important;align-items:center!important}
  .hero-vis{display:none!important}
  .hero-ct h1{font-size:22px!important;text-align:center!important}
  .hero-qs{font-size:13px!important;text-align:center!important}
  .hero-p{font-size:13px!important;margin-bottom:12px!important;text-align:center!important;max-width:100%!important}
  .hero-feats{gap:8px!important;margin-bottom:14px!important}
  .hf{font-size:12px!important}
  .hbadge{font-size:11px!important;padding:5px 12px!important;margin-bottom:12px!important}
  .hero-btns{flex-direction:column!important;gap:10px!important;margin-bottom:18px!important;width:100%!important}
  .hero-btns .btn{width:100%!important;justify-content:center!important;font-size:14px!important;padding:14px!important}
  .stats{gap:16px!important;justify-content:center!important;flex-wrap:wrap!important;padding-top:14px!important}
  .stat b{font-size:20px!important}.stat span{font-size:10px!important}

  .sp-grid{grid-template-columns:repeat(2,1fr)!important;gap:12px!important}
  .sp-grid2{grid-template-columns:repeat(2,1fr)!important;gap:12px!important}
  .doc-grid{grid-template-columns:1fr!important}
  .feat-grid{grid-template-columns:1fr!important}
  .ph-grid{grid-template-columns:1fr!important}
  .svc-grid{grid-template-columns:1fr!important}
  .svc-card-featured{transform:none!important}
  .partner-grid{grid-template-columns:1fr!important}
  .sp-docs-grid{grid-template-columns:1fr!important}
  .fg-grid{grid-template-columns:1fr!important}
  .doc-page-grid{grid-template-columns:1fr!important}
  .fp{position:static!important}
  .doc-hero-inner{flex-direction:column!important;gap:18px!important}
  .doc-stats{grid-template-columns:1fr 1fr!important}
  .srch{grid-template-columns:1fr!important}
  .cons-lay{grid-template-columns:1fr!important;gap:14px!important}
  .doc-list{max-height:180px;overflow-y:auto}
  .chat-msgs{max-height:260px!important}
  .apt-card{flex-direction:column!important;align-items:stretch!important;gap:12px!important;padding:14px!important}
  .book-page,.join-page{padding:12px!important}
  .book-card,.form-card{padding:16px!important}
  .book-hero,.join-hero{flex-direction:column!important;padding:18px!important;text-align:center!important}
  .book-hero-anim{display:none!important}
  .foot-bot{flex-direction:column;text-align:center;gap:8px}
  table,input,select{max-width:100%!important;box-sizing:border-box!important}
  .mobile-col{display:flex!important;flex-direction:column!important;gap:14px!important}
}

@media(max-width:400px){
  .hero-ct h1{font-size:19px!important}
  .sp-grid,.sp-grid2{grid-template-columns:1fr 1fr!important}
}

@yield('styles')
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="nav">
  <div class="nav-inner">
    <div class="nav-top">
      <a href="{{ route('home') }}" class="logo">
        <div class="lm"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <div><div class="ln">منصة <span>الزنتان</span></div><div class="ls">Zintan Medical</div></div>
      </a>
      <div class="nav-right">
        <button class="lang-btn" onclick="toggleLang()" id="lang-btn">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          <span id="lang-label">AR</span>
        </button>
        <button class="icon-btn" onclick="toggleDark()" id="theme-btn">
          <svg id="moon-icon" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
          <svg id="sun-icon" viewBox="0 0 24 24" style="display:none"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </button>
        <div class="uav" id="user-avatar">م</div>
      </div>
    </div>
    <!-- تبويبات ديسكتوب — تمتد على عرض الشاشة كاملاً -->
    <div class="nav-tabs-wrap">
      <div class="nav-tabs">
        <a href="{{ route('home') }}" class="nt {{ request()->routeIs('home') || request()->routeIs('home.page') ? 'on' : '' }}">الرئيسية</a>
        <a href="{{ route('doctors') }}" class="nt {{ request()->routeIs('doctors') ? 'on' : '' }}">الأطباء</a>
        <a href="{{ route('specialties') }}" class="nt {{ request()->routeIs('specialties') ? 'on' : '' }}">التخصصات</a>
        <a href="{{ route('pharmacies') }}" class="nt {{ request()->routeIs('pharmacies') ? 'on' : '' }}">الصيدليات</a>
        <a href="{{ route('appointments') }}" class="nt {{ request()->routeIs('appointments') ? 'on' : '' }}">مواعيدي</a>
        <a href="{{ route('consultation') }}" class="nt {{ request()->routeIs('consultation') ? 'on' : '' }}">تواصل مع طبيبك</a>
        <a href="{{ route('booking') }}" class="nt bk">احجز موعد</a>
      </div>
    </div>
  </div>
</nav>

<!-- شريط الحجز تحت الـ nav — لابتوب فقط -->
<div class="nav-book-bar">
  <div class="nav-book-bar-inner">
    <div class="nav-book-bar-text">
      <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
      احجز موعدك الآن مع أفضل أطباء مدينة الزنتان — سريع، مجاني، بدون انتظار
    </div>
    <a href="{{ route('booking') }}" class="btn bp bsm">احجز موعداً الآن ←</a>
  </div>
</div>

<!-- تبويبات موبايل -->
<div class="mob-tabs-bar">
  <a href="{{ route('home') }}" class="mob-t {{ request()->routeIs('home') ? 'on' : '' }}">الرئيسية</a>
  <a href="{{ route('doctors') }}" class="mob-t {{ request()->routeIs('doctors') ? 'on' : '' }}">الأطباء</a>
  <a href="{{ route('specialties') }}" class="mob-t {{ request()->routeIs('specialties') ? 'on' : '' }}">التخصصات</a>
  <a href="{{ route('pharmacies') }}" class="mob-t {{ request()->routeIs('pharmacies') ? 'on' : '' }}">الصيدليات</a>
  <a href="{{ route('appointments') }}" class="mob-t {{ request()->routeIs('appointments') ? 'on' : '' }}">مواعيدي</a>
  <a href="{{ route('consultation') }}" class="mob-t {{ request()->routeIs('consultation') ? 'on' : '' }}">طبيبك</a>
  <a href="{{ route('booking') }}" class="mob-t bk">← احجز</a>
</div>

@yield('content')

<footer class="footer">
  <div class="fg-grid">
    <div class="fg-col">
      <div class="logo" style="margin-bottom:16px">
        <div class="lm"><svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
        <div class="ln" style="color:#fff;font-size:17px">منصة <span style="color:rgba(255,255,255,.7)">الزنتان</span></div>
      </div>
      <p>منصتك الموثوقة لحجز المواعيد الطبية في مدينة الزنتان، ليبيا.</p>
    </div>
    <div class="fg-col"><h4>روابط سريعة</h4><ul><li>الرئيسية</li><li>الأطباء</li><li>التخصصات</li><li>الصيدليات</li></ul></div>
    <div class="fg-col"><h4>حسابي</h4><ul><li>مواعيدي</li><li>تواصل مع طبيبك</li><li>احجز موعد</li></ul></div>
    <div class="fg-col"><h4>تواصل معنا</h4><ul><li>مدينة الزنتان، ليبيا</li><li>info@zintanmed.ly</li><li>091-000-0000</li></ul></div>
  </div>
  <div class="foot-bot"><span>© 2026 منصة الزنتان الطبية</span><span>مشروع تخرج</span></div>
</footer>

<script>
const API = '{{ secure_url("/api") }}';
const token = localStorage.getItem('token');
const user = JSON.parse(localStorage.getItem('user') || '{}');
const html = document.getElementById('html-root');

if (user && user.name) {
  document.getElementById('user-avatar').textContent = user.name.charAt(0);
}
if (localStorage.getItem('theme') === 'dark') {
  html.setAttribute('data-theme', 'dark');
  document.getElementById('moon-icon').style.display = 'none';
  document.getElementById('sun-icon').style.display = 'block';
}
if (localStorage.getItem('lang') === 'en') {
  html.setAttribute('lang', 'en');
  html.setAttribute('dir', 'ltr');
  document.getElementById('lang-label').textContent = 'AR';
}

function toggleDark() {
  const isDark = html.getAttribute('data-theme') === 'dark';
  if (isDark) {
    html.removeAttribute('data-theme');
    document.getElementById('moon-icon').style.display = 'block';
    document.getElementById('sun-icon').style.display = 'none';
    localStorage.setItem('theme', 'light');
  } else {
    html.setAttribute('data-theme', 'dark');
    document.getElementById('moon-icon').style.display = 'none';
    document.getElementById('sun-icon').style.display = 'block';
    localStorage.setItem('theme', 'dark');
  }
}

function toggleLang() {
  const isAr = (localStorage.getItem('lang') || 'ar') === 'ar';
  if (isAr) {
    html.setAttribute('lang','en');html.setAttribute('dir','ltr');
    document.getElementById('lang-label').textContent = 'AR';
    localStorage.setItem('lang','en');
  } else {
    html.setAttribute('lang','ar');html.setAttribute('dir','rtl');
    document.getElementById('lang-label').textContent = 'EN';
    localStorage.setItem('lang','ar');
  }
}

(function(){
  const hl = new URLSearchParams(window.location.search).get('highlight');
  if (!hl) return;
  setTimeout(function(){
    document.querySelectorAll('.ph-card,[data-name]').forEach(function(el){
      const name = el.getAttribute('data-name') || (el.querySelector('.ph-name') && el.querySelector('.ph-name').textContent);
      if (name && name.trim() === hl.trim()) {
        el.scrollIntoView({behavior:'smooth', block:'center'});
        el.classList.add('highlight-pulse');
        el.style.border = '2px solid var(--p)';
        setTimeout(function(){ el.classList.remove('highlight-pulse'); }, 1000);
      }
    });
  }, 500);
})();
</script>
@yield('scripts')
</body>
</html>
