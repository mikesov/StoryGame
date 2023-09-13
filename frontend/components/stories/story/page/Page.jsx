import { Dimensions, View } from 'react-native';
import React from 'react';
import styles from './page.style';
import {Canvas, Text, Rect, Fill, Image, useImage, useFont } from '@shopify/react-native-skia'

const Page = ({item}) => {
  const { width, height } = Dimensions.get("window");
  // console.log(item.sentence.content);

  const font = useFont(require("../../../../assets/fonts/PTSans-Regular.ttf"), 20);
  const image=useImage(item.image.image);

  return (
    // <View style={styles.container(width, height)}>
    //   <Image 
    //     source={{uri: item.image.image}}
    //     style={styles.backgroundImage(width, height)}
    //   />
      
    // </View>
    <Canvas
    width={width}
    height={height}
    
    style={{flex: 1}}
    >
      <Fill color="white"/>
      <Image image={image} fit="contain" x={0} y={0} width={width} height={height} />
      <Text
      x={width/3}
      y={20}
      text={item.sentences[0].content}
      color="black"
      font={font}
      />
    </Canvas>
  )
}

export default Page