function LWEvent(){this.key='default_tracking';this.config={eventsLimit:100,expiredInSeconds:86400};this.data=[];this.data=this.getDB();if(this.DBExpired()){this.clearDB()}
this.data=this.getDB();if(this.data.timeStamp==null){this.data.timeStamp=this.getCurrentTimeStamp()}
if(this.data.profileId==null){this.data.profileId=this.makeProfileId()}
this.saveDB()}
LWEvent.prototype.getCurrentTimeStamp=function(){return Math.floor(Date.now()/1000)}
LWEvent.prototype.DBExpired=function(){if(typeof(this.data)=="undefined")return!0;if(typeof(this.data.timeStamp)=="undefined")return!0;return this.getCurrentTimeStamp()-this.data.timeStamp>this.config.expiredInSeconds}
LWEvent.prototype.makeProfileId=function(){return Math.random().toString(36).substring(2,15)+Math.random().toString(36).substring(2,15)}
LWEvent.prototype.hasLocalStorage=function(){return typeof(Storage)!=="undefined"};LWEvent.prototype.saveDB=function(){if(this.hasLocalStorage()){return localStorage.setItem(this.key,JSON.stringify(this.data))}
return!1};LWEvent.prototype.clearDB=function(){if(this.hasLocalStorage()){return localStorage.removeItem(this.key)}
return!1};LWEvent.prototype.getDB=function(){if(this.hasLocalStorage()){const data=localStorage.getItem(this.key);if(data)
return JSON.parse(data)}
var isMobile=!1;if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){isMobile=!0}
const browser={isMobile:isMobile?'Mobile':'Not mobile',name:bowser.name,version:bowser.version,osName:bowser.osname,osVersion:bowser.osversion,screen:{availWidth:screen.availWidth,availHeight:screen.availHeight,}};return{profileId:null,events:[],browser:browser}};LWEvent.prototype.push=function(event){if(this.data.events.length>this.config.eventsLimit){this.data.events.shift()}
event.timeStamp=this.getCurrentTimeStamp();this.data.events.push(event);this.saveDB()}
LWEvent.prototype.get=function(){return this.data}
LWEvent.prototype.isExternalLink=function(){return this.hostname&&this.hostname!==location.hostname}
var LWE=new LWEvent();if(document.referrer&&LWE.isExternalLink(document.referrer)){LWE.push({'type':'referer','data':{url:document.referrer}})}
LWE.push({'type':'pageView','data':{title:document.title,url:location.href}});function saveToForm(){const tracers=document.querySelectorAll('[name="_form_data_trace"]');for(let i=0;i<tracers.length;i++){tracers[i].value=JSON.stringify(LWE.getDB())}}
window.addEventListener('load',function(event){saveToForm()})
;