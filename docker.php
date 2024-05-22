<?php
echo 'version: "3.9"

name: nchcsystem

networks:
  nchc:
    external: false
    
services:
';
for($i=5001;$i<=5030;$i++){
$cmd="mkdir -p ./storage/openwebui_data_".$i;
exec($cmd);
$text='  nchc_openwebui_'.$i.':
    container_name: nchc_openwebui_'.$i.'
    image: ghcr.io/open-webui/open-webui:main
    #pull_policy: always
    ports:
      - '.$i.':'.$i.'    
    volumes:
      - ./storage/openwebui_data_'.$i.':/app/backend/data
    restart: unless-stopped
    networks:
      - nchc    
    extra_hosts:
      - host.docker.internal:host-gateway   
    environment:
      - /ollama/api=http://nchc_ollama:11434/api
      - OPENAI_API_BASE_URLS=${OPENAI_API_BASE_URLS}
      - OPENAI_API_KEYS=${OPENAI_API_KEYS}
      - PORT='.$i;      
	  
echo $text."\n\n";
}

echo '  nchc_nginx:
    container_name: nchc_nginx
    image: nginx
    ports:
      - 443:443
    volumes:
      - ./nginx/biobank_ssl:/ssl
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf 
      - ./nginx/htpasswd.txt:/etc/nginx/.htpasswd  
      - ./website/assets:/usr/share/nginx/html/assets
      - ./website/index_ds_ip.html:/usr/share/nginx/html/index.html
    restart: always
    networks:
        - nchc       
    extra_hosts:
      - host.docker.internal:host-gateway 
	  
';