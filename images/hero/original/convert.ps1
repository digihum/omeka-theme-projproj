gm.exe mogrify -quality 40 -output-directory "../high" "*.jpg"
gm.exe mogrify -quality 40 -resize 1920x1080 -output-directory "../med" "*.jpg"
gm.exe mogrify -quality 40 -resize 800x600 -output-directory "../low" "*.jpg"
