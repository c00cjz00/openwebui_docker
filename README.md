# nchc service

## DOCKER 安裝
- https://hackmd.io/@whYPD8MBSHWRZV6y-ymFwQ/Hk8pJ95eA
- https://docs.nvidia.com/datacenter/cloud-native/container-toolkit/latest/install-guide.html


## GIT 下載套件
```
git clone https://github.com/c00cjz00/openwebui_docker.git
```
## 安裝課程數量
```
php docker.php > docker-compose.yml
```


## 編輯e.v.sample
- 1. Copy env.sample to .env 
```
cp  env.sample .env 
```
- 2. Edit .env
```
# OPENAI 相容套件金鑰
OPENAI_API_BASE_URLS="https://api.openai.com/v1;https://api.groq.com/openai/v1"
OPENAI_API_KEYS="sk-xxx;gsk_xxx"

# HF_TOKEN
HF_TOKEN="hf_xxx"
```

## 3. 啟動服務
```
docker compose up -d 
```

## 4: 關閉服務
```
docker compose down 

#docker compose down -v # 全刪除
```

