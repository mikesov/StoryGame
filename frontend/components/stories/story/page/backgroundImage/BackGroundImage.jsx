import { Dimensions, View, ActivityIndicator } from 'react-native';
import { useState, useEffect, useRef } from 'react';
import { Audio } from 'expo-av';
import {Canvas, Text, Rect, Fill, Image, useImage, useFont, Path, Group, Skia, TextBlob } from '@shopify/react-native-skia';

import styles from './backgroundImage.style';

export default BackgroundImage = ({ imageObject }) => {
  const { width, height } = Dimensions.get("window");
  
  const image = useImage(imageObject.image);

  return (
    <Image image={image} fit="contain" x={0} y={0} width={width} height={height} />
  );
}