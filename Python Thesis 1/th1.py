import gensim
import nltk
from gensim.models import Word2Vec
import numpy as np
from sklearn import cluster
from nltk.tokenize import sent_tokenize, word_tokenize
from gensim.models import KeyedVectors
from gensim.models import TfidfModel,phrases
from gensim.parsing.preprocessing import remove_stopwords
from gensim.parsing.preprocessing import stem_text
from sklearn.preprocessing import Normalizer
from sklearn.feature_extraction.text import TfidfVectorizer
import json
import re
import objectpath
import sys
from sklearn import metrics
from sklearn.metrics import silhouette_score
from sklearn.metrics import silhouette_samples
import re
from os import listdir
from os.path import isfile, join
import jsonref

#word2vec = KeyedVectors.load('google-word2vec.model', mmap='r')
in_sum=0
out_sum=0
#word2vec.save("fasttext.model")
model=sys.argv[2]
# using fasttext model
# you need to download a pre-trained model from this link: https://fasttext.cc/docs/en/english-vectors.html
if model=="f":
    word2vec = KeyedVectors.load('fasttext.model', mmap='r')#FastText model
#using google news model
elif model=="g":
    word2vec = KeyedVectors.load('google-word2vec.model')

my_stopwords=[]
if len(sys.argv)==4:
    word_remover=sys.argv[3]
    #this condition for check verbs variable
    if word_remover=='verbs':
        text_file = open("verbs.txt", "r")
        lines = text_file.readlines()
        #my_stopwords=[]
        for text in lines:
            text=text.rstrip('\n')
            my_stopwords.append(text)
    #this condition for using simple stop word removal
    if word_remover=='simple':
        my_stopwords = ['search','complete','update', 'delete','create','get','retrieve','add','remove','post','put','do','set','track','notify','activate','cancel','reset','modify','confirm','run','start','copy','revoke']

def read_json(json_file):
    with open(json_file) as json_data:
        d = json.load(json_data)
        tree = objectpath.Tree(d['paths'])
        texts=[]
        rt = tuple(tree.execute('$..operationId')) #this line can get the operationId
        tt=[]
        tt=rt
        if (len(tt)==0):#if json file has no operationId will use paths as input
            print("No OperationId!")
            tt=d['paths']
        for element in tt:
            #element=element.rsplit('/', 1)[-1] #this line will get the last part of url
            element=re.sub('[^a-zA-Z]+', ' ', element)#this one line leave only letters in text
            element=re.findall('[A-Za-z][^A-Z]*', element)# divide words based on capital letters
            element=" ".join(element)
            element=re.sub('(\\b[A-Za-z] \\b|\\b [A-Za-z]\\b)', '', element)#this will remove single letters
            texts.append(element)
        return texts

def cleanOpName(name):
    name=re.sub('[^a-zA-Z]+', ' ', name)#this one line leave only letters in text
    name=re.findall('[A-Za-z][^A-Z]*', name)# divide words based on capital letters
    name=" ".join(name)
    name=re.sub('(\\b[A-Za-z] \\b|\\b [A-Za-z]\\b)', '', name)
    name=name.replace(" ","")
    return name
def shorttext_to_embedvec(shorttext):

        """ Convert the short text into an averaged embedded vector representation.
        Given a short sentence, it converts all the tokens into embedded vectors according to
        the given word-embedding model, sums
        them up, and normalize the resulting vector. It returns the resulting vector
        that represents this short sentence.
        :param shorttext: a short sentence
        :return: an embedded vector that represents the short sentence
        :type shorttext: str
        :rtype: numpy.ndarray
        """
        vecsize=300#size of word2vec google news model
        vec = np.zeros(vecsize)#Return a new array of given shape and type, filled with zeros.
        #print(shorttext)
        tokens = word_tokenize(shorttext)#converts sentence to array of words
        #this here will remove some words that i think it will effect the clustering process
        #print()
        #print("Words before vectorizing:")
        #print(shorttext)
        for word in list(tokens):  # iterating on a copy since removing will mess things up
            if word in my_stopwords:
                tokens.remove(word)
        #print(tokens)
        #for i in range(len(tokens)):
            #print(tokens[i])
        #bigrams=phrases.Phrases(tokens)
        for token in tokens:
            if token in word2vec:
                vec += word2vec[token]# numpy vector of a word
        norm = np.linalg.norm(vec)
        #norm = normalize
        if norm!=0:
            vec /= np.linalg.norm(vec)
        return vec

X=[]
file_name=sys.argv[1]
text=read_json(file_name)
for sentence in text:
    sentence=sentence.lower()#makes all letter small letters
    print(sentence)
    sentence=remove_stopwords(sentence)#removes stopwors using gensim
    #sentence=stem_text(sentence)

    X.append(shorttext_to_embedvec(sentence))#convert sentences to vectors
#af = cluster.AffinityPropagation(damping=.77,max_iter=1000,convergence_iter=1000)
af = cluster.AffinityPropagation(damping=.7,max_iter=300,convergence_iter=50)

#af = cluster.AffinityPropagation(damping=.99)

#X=Normalizer(X)
#vectorizer = TfidfVectorizer(norm='l2')
#tfx = vectorizer.fit_transform(text)
#print(X)
af.fit(X)
labels = af.labels_


#labels.sort()
#centroids = af.cluster_centers_
zipped=zip(labels,text)
zipped=list(zipped)
zipped.sort()
i=0
#print()
for index,line in zipped:
    if i==index:
        #print(line.replace(" ", ""))
        print(index,line.replace(" ",""))
    else:
        #print()
        #print(line.replace(" ", ""))
        print(index,line.replace(" ",""))
        i=i+1
#for index, sentence in enumerate(text):
#    print (str(labels[index]) + ":" + str(sentence))#assigning clusters to sentences
#print(i)
#print("Silhouette Score:")
#print(silhouette_score(X,labels))
#print("Calinski Harabaz Score:")
#print(metrics.calinski_harabaz_score(X, labels))
