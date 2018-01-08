#!/bin/sh
raspivid -o - -t 9999999 -w 800 -h 600 --hflip | cvlc -vvv stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:9090}' :demux=h264
