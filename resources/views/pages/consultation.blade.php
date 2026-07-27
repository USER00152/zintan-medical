@extends('layouts.app')

@section('title', 'تواصل مع طبيبك — منصة الزنتان الطبية')

@section('styles')
<style>
.cons-page{max-width:1000px;margin:0 auto;padding:28px 20px 60px}
.cons-lay{display:grid;grid-template-columns:280px 1fr;gap:20px;align-items:start}
.doc-list{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden}
.doc-list-hd{padding:16px 18px;border-bottom:1px solid var(--bds);font-size:14px;font-weight:800;color:var(--td)}
.doc-item{padding:14px 18px;display:flex;align-items:center;gap:12px;cursor:pointer;transition:.2s;border-bottom:1px solid var(--bds)}
.doc-item:last-child{border-bottom:none}
.doc-item:hover{background:var(--pll)}
.doc-item.on{background:var(--pl);border-right:3px solid var(--p)}
.doc-av-sm{width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:800;flex-shrink:0}
.doc-info h4{font-size:13.5px;font-weight:800;color:var(--td);margin-bottom:2px}
.doc-info span{font-size:11.5px;color:var(--tm)}
.online-dot{width:8px;height:8px;border-radius:50%;background:#22a55e;margin-right:auto;flex-shrink:0}
.chat-area{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);display:flex;flex-direction:column;height:580px}
.chat-hd{padding:16px 20px;border-bottom:1px solid var(--bds);display:flex;align-items:center;gap:12px}
.chat-hd h3{font-size:15px;font-weight:800;color:var(--td)}
.chat-hd span{font-size:12px;color:#22a55e;font-weight:600}
.chat-msgs{flex:1;overflow-y:auto;padding:20px;display:flex;flex-direction:column;gap:12px}
.msg{max-width:72%;padding:12px 16px;border-radius:18px;font-size:13.5px;line-height:1.6}
.msg-time{font-size:10.5px;opacity:.6;margin-top:4px;display:block}
.msg-me{background:var(--p);color:#fff;align-self:flex-end;border-bottom-right-radius:4px}
.msg-dr{background:var(--pl);color:var(--td);align-self:flex-start;border-bottom-left-radius:4px;border:1px solid var(--bdr)}
.chat-inp{padding:16px;border-top:1px solid var(--bds);display:flex;gap:10px;align-items:flex-end}
.chat-inp textarea{flex:1;padding:11px 14px;border:1.5px solid var(--bdr);border-radius:14px;font-size:14px;font-family:var(--font);color:var(--td);background:var(--bg);resize:none;min-height:44px;max-height:120px;transition:.2s}
.chat-inp textarea:focus{outline:none;border-color:var(--p);background:var(--card)}
.send-btn{width:44px;height:44px;border-radius:50%;background:var(--p);border:none;display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0;transition:.2s;box-shadow:var(--sp)}
.send-btn:hover{background:var(--pd);transform:scale(1.08)}
.send-btn svg{width:18px;height:18px;fill:none;stroke:#fff;stroke-width:2.5;stroke-linecap:round}
.empty-chat{display:flex;flex-direction:column;align-items:center;justify-content:center;flex:1;color:var(--tm);text-align:center;padding:40px}
.empty-chat svg{width:56px;height:56px;fill:none;stroke:var(--bdr);stroke-width:1.5;stroke-linecap:round;margin-bottom:16px}
.empty-chat h3{font-size:16px;font-weight:700;margin-bottom:8px;color:var(--td)}
.empty-chat p{font-size:13.5px;line-height:1.7}
@media(max-width:768px){
  .cons-lay{grid-template-columns:1fr!important}
  .chat-area{height:420px}
}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">تواصل مع طبيبك</span></div>
    <h1>تواصل مع طبيبك</h1>
    <p>أرسل رسائلك وتقاريرك مباشرة إلى طبيبك</p>
  </div>
</div>

<div class="cons-page">
  <div class="cons-lay">

    {{-- قائمة الأطباء --}}
    <div class="doc-list">
      <div class="doc-list-hd">الأطباء المتاحون</div>
      <div id="doc-list-items">
        <div style="padding:20px;text-align:center;color:var(--tm);font-size:13px">جاري التحميل...</div>
      </div>
    </div>

    {{-- منطقة المحادثة --}}
    <div class="chat-area" id="chat-area">
      <div class="empty-chat" id="empty-state">
        <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        <h3>اختر طبيباً للمحادثة</h3>
        <p>اختر من قائمة الأطباء على اليسار لبدء المحادثة</p>
      </div>
      <div id="chat-inner" style="display:none;flex-direction:column;height:100%">
        <div class="chat-hd">
          <div class="doc-av-sm" id="chat-doc-av">د</div>
          <div>
            <h3 id="chat-doc-name">اسم الطبيب</h3>
            <span>● متاح الآن</span>
          </div>
        </div>
        <div class="chat-msgs" id="chat-msgs"></div>
        <div class="chat-inp">
          <textarea id="msg-input" placeholder="اكتب رسالتك هنا..." rows="1"
            onkeydown="if(event.key==='Enter'&&!event.shiftKey){event.preventDefault();sendMsg()}"></textarea>
          <button class="send-btn" onclick="sendMsg()">
            <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
          </button>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<script>
let currentDoctor = null;
let conversations  = {};

/* ══ جلب الأطباء مباشرة بدون تسجيل دخول ══ */
async function loadDoctors(){
  try {
    const r = await fetch(API+'/doctors', {
      headers:{'Accept':'application/json'}
    });
    const doctors = await r.json();

    if(!Array.isArray(doctors) || !doctors.length){
      document.getElementById('doc-list-items').innerHTML =
        '<div style="padding:20px;text-align:center;color:var(--tm);font-size:13px">لا يوجد أطباء متاحون</div>';
      return;
    }

    let html = '';
    doctors.forEach(function(d){
      const name = d.user && d.user.name ? d.user.name : 'طبيب';
      const spec = d.specialty && d.specialty.name_ar ? d.specialty.name_ar : '';
      const init = name.charAt(0);
      const encoded = encodeURIComponent(JSON.stringify(d));
      html += '<div class="doc-item" id="doc-'+d.id+'" onclick="selectDoctor(decodeDoc(\''+encoded+'\'), this)">';
      html += '<div class="doc-av-sm">'+init+'</div>';
      html += '<div class="doc-info"><h4>'+name+'</h4><span>'+spec+'</span></div>';
      html += '<div class="online-dot"></div>';
      html += '</div>';
    });
    document.getElementById('doc-list-items').innerHTML = html;
  } catch(e){
    document.getElementById('doc-list-items').innerHTML =
      '<div style="padding:20px;text-align:center;color:var(--tm);font-size:13px">تعذّر التحميل</div>';
  }
}

function decodeDoc(encoded){
  return JSON.parse(decodeURIComponent(encoded));
}

function selectDoctor(doc, el){
  currentDoctor = doc;
  document.querySelectorAll('.doc-item').forEach(function(i){i.classList.remove('on')});
  el.classList.add('on');

  const name = doc.user && doc.user.name ? doc.user.name : 'طبيب';
  const spec = doc.specialty && doc.specialty.name_ar ? doc.specialty.name_ar : 'طبيب';
  document.getElementById('chat-doc-name').textContent = name;
  document.getElementById('chat-doc-av').textContent   = name.charAt(0);
  document.getElementById('empty-state').style.display  = 'none';
  document.getElementById('chat-inner').style.display   = 'flex';

  if(!conversations[doc.id]){
    conversations[doc.id] = [
      {from:'dr', text:'أهلاً! أنا '+name+' متخصص في '+spec+'. كيف يمكنني مساعدتك اليوم؟', time:getTime()}
    ];
  }
  renderMsgs(doc.id);
}

function renderMsgs(docId){
  const msgs = conversations[docId] || [];
  let html = '';
  msgs.forEach(function(m){
    const cls = m.from==='me' ? 'msg msg-me' : 'msg msg-dr';
    html += '<div class="'+cls+'">'+m.text+'<span class="msg-time">'+m.time+'</span></div>';
  });
  const el = document.getElementById('chat-msgs');
  el.innerHTML = html;
  el.scrollTop = el.scrollHeight;
}

function getTime(){
  const d = new Date();
  return d.getHours()+':'+String(d.getMinutes()).padStart(2,'0');
}

const autoReplies = [
  'شكراً على تواصلك معي. سأراجع حالتك وأرد عليك قريباً.',
  'يسعدني مساعدتك. هل يمكنك توضيح الأعراض بشكل أكثر تفصيلاً؟',
  'تم استلام رسالتك. أنصحك بالمراجعة للفحص الدقيق.',
  'معلومات مهمة. هل أنت على أدوية حالياً؟',
  'أفهم وضعك. ننصح بحجز موعد للكشف المباشر.',
  'سأراجع بياناتك وأرسل لك التوصيات اللازمة.',
];
let replyIdx = 0;

function sendMsg(){
  if(!currentDoctor) return;
  const inp  = document.getElementById('msg-input');
  const text = inp.value.trim();
  if(!text) return;

  conversations[currentDoctor.id].push({from:'me', text:text, time:getTime()});
  inp.value = '';
  renderMsgs(currentDoctor.id);

  setTimeout(function(){
    const reply = autoReplies[replyIdx % autoReplies.length];
    replyIdx++;
    conversations[currentDoctor.id].push({from:'dr', text:reply, time:getTime()});
    renderMsgs(currentDoctor.id);
  }, 1800);
}

loadDoctors();
</script>
@endsection
