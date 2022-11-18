import pandas as pd
import numpy as np
from sklearn.cluster import KMeans
from sklearn.preprocessing import MinMaxScaler
from matplotlib import pyplot as plt

df = pd.read_csv("/Users/rohan/Desktop/DMW/ASSI_2_DWM/assi_2/point.csv")
km = KMeans(n_clusters=2, init='kmeans++')
km = km.fit(df[['S1', "S2"]])
# km.cluster_centers_
