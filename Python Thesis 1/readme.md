-	This is a Python script that implements the algorithm that was described in this [paper]( https://pp.bme.hu/eecs/article/view/13925).
-	To run this script you need to download [fastText](https://fasttext.cc/docs/en/english-vectors.html) and [word2vec]( https://drive.google.com/file/d/0B7XkCwpI5KDYNlNUTTlSS21pQmM/edit?usp=sharing) pre-trained models.
-	execute this command to run: `python th1.py moneyApp.json [m] verbs`
-	`[m]` should be replace with `g` which is google word2vec model or `f` which is fastText model.
-	`verbs` is optional which removes some stop words from the operation names in the APIs.
-	`moneyApp.json` is an Swagger API definition file.
