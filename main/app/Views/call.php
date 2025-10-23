<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Telepon RS Mitra Husada Pringsewu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sip.js@0.15.9/dist/sip.min.js"></script>
  <style>
    body { background:#f7f9fc }
    .card { max-width:500px; margin:0 auto; padding:2rem }
    audio { width:100% }
    #log { max-height:180px; overflow:auto; font:12px/1.3 ui-monospace,monospace; background:#0f0f0f; color:#e6e6e6; padding:8px; border-radius:8px }
  </style>
</head>
<body class="py-5">
  <div class="container text-center">
    <h1 class="mb-4">Call Customer Service</h1>
    <h2 class="mb-4">RS Mitra Husada Pringsewu</h2>

    <div class="card shadow-sm">
      <p id="status">Click to start.</p>
      <button id="startBtn" class="btn btn-success w-100 mb-2">Start Call</button>
      <button id="endBtn" class="btn btn-danger w-100" style="display:none">End Call</button>
      <div class="mt-3">
        <small>Serve over HTTPS</small>
      </div>
    </div>

    <div class="card mt-3">
      <h6>Call Duration</h6>
      <audio id="remoteAudio" autoplay playsinline controls class="border rounded p-2"></audio>

      <h6 class="mt-3">IVR Menu</h6>
      <div class="d-grid gap-2">
        <div class="row mb-2">
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('1')"><h3>1</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('2')"><h3>2</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('3')"><h3>3</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('4')"><h3>4</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('5')"><h3>5</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('6')"><h3>6</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('7')"><h3>7</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('8')"><h3>8</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('9')"><h3>9</h3></button>
          </div>
	  <div class="col-4 mb-2">
              <button class="btn btn-outline-danger w-100" onclick="sendDTMF('*')"><h3>*</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-primary w-100" onclick="sendDTMF('0')"><h3>0</h3></button>
          </div>
          <div class="col-4 mb-2">
              <button class="btn btn-outline-danger w-100" onclick="sendDTMF('#')"><h3>#</h3></button>
          </div>

        </div>
      </div>

      <h6 class="mt-3 d-none">Log</h6>
      <div id="log" class="d-none"></div>
    </div>
  </div>

<script>
const WS_SERVER = "wss://voip.ruangdata.online:8089/ws";
const DOMAIN    = "voip.ruangdata.online";
const ICE_SERVERS = [
  { urls: "stun:voip.ruangdata.online:3478" },
  { urls: "turn:voip.ruangdata.online:3478",  username:"webrtc", credential:"passwordku123" },
  { urls: "turns:voip.ruangdata.online:5349", username:"webrtc", credential:"passwordku123" }
];

let ua = null, session = null, localStream = null;

const $ = id => document.getElementById(id);
const statusEl  = $('status');
const remoteAudio = $('remoteAudio');
const logEl     = $('log');
const startBtn  = $('startBtn');
const endBtn    = $('endBtn');

function log(msg){
  const ts = new Date().toLocaleTimeString();
  logEl.textContent = `[${ts}] ${msg}\n` + logEl.textContent;
}

function q(name){ return new URL(location.href).searchParams.get(name); }

async function startCall(){
  const from = q('from'), to = q('to'), sc = q('sc');
  if(!from || !to || !sc){ statusEl.textContent='Missing params: from, to, sc'; return; }

  startBtn.disabled = true;
  statusEl.textContent = 'Requesting mic…';

  try{
    localStream = await navigator.mediaDevices.getUserMedia({
      audio:{echoCancellation:true,noiseSuppression:true,autoGainControl:true},
      video:false
    });
    log('Mic granted');
  }catch(e){
    log('Mic denied: '+(e.message||e));
    statusEl.textContent='Mic denied';
    startBtn.disabled=false;
    return;
  }

  const target = `sip:${to}@${DOMAIN}`;
  statusEl.textContent = `Calling ${to}…`;
  log('Inviting '+target);

  ua = new SIP.UA({
    uri:`sip:${from}@${DOMAIN}`,
    transportOptions:{wsServers:[WS_SERVER]},
    authorizationUser:from,
    password:sc,
    autostart:false,
    sessionDescriptionHandlerFactoryOptions:{
      peerConnectionOptions:{
        rtcConfiguration:{iceServers:ICE_SERVERS,iceTransportPolicy:'all'}
      }
    }
  });

  ua.on('registered',()=>{log('Registered');statusEl.textContent='Registered';});
  ua.on('registrationFailed',e=>{log('Reg failed: '+(e?.cause||''));statusEl.textContent='Reg failed';});

  ua.start();
  await new Promise(r=>setTimeout(r,1200)); // wait register

  session = ua.invite(target,{
    sessionDescriptionHandlerOptions:{constraints:{audio:true,video:false}},
    media:{local:localStream}
  });

  session.on('accepted',()=>{
    log('Call accepted');
    statusEl.textContent='Call in progress';
    startBtn.style.display='none';
    endBtn.style.display='inline-block';
  });
  session.on('bye',()=>{log('Remote hung up');endCallUI();});
  session.on('failed',e=>{log('Call failed: '+(e?.cause||''));endCallUI();});

  (function attachRemote(){
    const sdh=session.sessionDescriptionHandler;
    if(!sdh||!sdh.peerConnection)return setTimeout(attachRemote,100);
    const pc=sdh.peerConnection;
    pc.ontrack=ev=>{
      remoteAudio.srcObject=ev.streams[0]||new MediaStream(pc.getReceivers().map(r=>r.track));
      remoteAudio.play().catch(()=>{});
    };
  })();
}

function endCall(){
  if(session){ session.bye(); session=null; }
  if(ua){ ua.stop(); ua=null; }
  endCallUI();
}

function endCallUI() {
  statusEl.textContent = 'Call ended';
  startBtn.style.display = 'inline-block';
  startBtn.disabled = false;
  endBtn.style.display = 'none';

  const extension = q('from');
  if (!extension) return;
  fetch(`https://rsmh.amatiran.my.id/api/voip/extensions/${extension}`, {
    method: 'DELETE',
    headers: { 'accept': 'application/json' }
  })
    .then(r => r.json())
    .then(() => {
      try { window.close(); } catch (_) {}
      location.href = 'about:blank';
    })
    .catch(e => log('API delete error: ' + e.message));
}

function sendDTMF(digit){
  if(!session || !session.sessionDescriptionHandler){
    log('DTMF gagal: sesi belum aktif');
    return;
  }
  try {
    session.dtmf(digit);
    log('Kirim DTMF: '+digit);
  } catch(e){
    log('DTMF error: '+(e.message||e));
  }
}

startBtn.addEventListener('click',startCall);
endBtn.addEventListener('click',endCall);
window.addEventListener('load',()=>log('Loaded – click Start Call'));
</script>
</body>
</html>
