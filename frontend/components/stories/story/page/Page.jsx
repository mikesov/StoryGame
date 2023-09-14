import { Dimensions, View, ActivityIndicator } from 'react-native';
import { useState, useEffect } from 'react';
import { Audio } from 'expo-av';
import styles from './page.style';
import {Canvas, Text, Rect, Fill, Image, useImage, useFont, Path } from '@shopify/react-native-skia'

const Page = ({ item, setPageFinish, currentIndex }) => {

  const [soundObject, setSoundObject] = useState(null);

  useEffect(() => {
    const loadAudio = async () => {
      try {
        const { sound } = await Audio.Sound.createAsync(
          { uri: item.sentences[0].audio.audio },
          { shouldPlay: false }
        );
        setSoundObject(sound);
      } catch (error) {
        console.error('Error loading audio:', error);
      }
    };

    loadAudio();

    return () => {
      if (soundObject) {
        soundObject.unloadAsync();
      }
    };
  }, [item.audioUri]);

  const playAudio = async () => {
    try {
      if (soundObject) {
        setPageFinish(false);
        await soundObject.playAsync();
        setPageFinish(true);
      }
    } catch (error) {
      console.error('Error playing audio:', error);
    }
  };

  const { width, height } = Dimensions.get("window");

  const font = useFont(require("../../../../assets/fonts/PTSans-Regular.ttf"), 24);
  const image = useImage(item.image.image);


  return (
    <Canvas
      width={width}
      height={height}
      style={{flex: 1}}
      onTouch={playAudio}
    >
      <Fill color="white"/>
      <Image image={image} fit="contain" x={0} y={0} width={width} height={height} />
      <Path
        transform={[{ scale: 0.5 }]}
        path={"M 633 320 609 332 599 332 592 332 591 332 589 330 588 328 588 326 576 324 567 323 561 320 558 317 556 313 557 309 559 305 561 301 554 299 546 298 541 293 538 290 535 282 534 277 536 273 541 268 554 270 551 264 549 258 550 255 553 251 555 247 560 244 563 242 554 235 551 228 551 225 551 221 553 217 555 216 561 215 563 215 567 215 574 217 574 212 581 207 592 212 605 218 615 213 613 202 563 170 533 148 543 138 543 128 552 105 558 93 537 42 511 1 633 1 632 37 643 109 647 147 669 111 683 139 703 123 718 118 725 136 709 187 694 209 690 206 692 202 687 193 686 187 688 181 691 180 695 179 703 146 631 200 632 203 650 199 669 195 683 198 689 201 703 215 705 237 685 272 667 290 661 295 659 298 657 303 655 313 652 320 645 325 642 325 639 325 635 325 633 324 Z"}
        color={"lightblue"}
      />
      <Path 
        transform={[{scale: 0.5}]}
        path={"M 1087 329 1067 334 1054 334 1050 329 1050 325 1050 323 1026 327 1021 323 1020 317 1022 312 1026 309 1027 308 1019 302 1011 300 1007 297 1003 294 1001 291 1004 287 1006 286 1009 286 1005 276 995 262 985 244 980 226 984 209 998 201 1016 198 1033 198 1053 202 1053 196 1025 189 1001 187 991 184 989 184 971 249 977 260 978 267 974 271 966 275 964 294 961 301 959 301 957 296 957 290 958 282 958 280 954 280 951 277 949 275 948 272 947 267 946 264 945 261 958 247 963 202 971 166 979 158 987 156 993 119 1022 143 1035 157 1043 104 1052 45 1051 1 1173 1 1119 115 1131 124 1177 89 1193 75 1199 73 1199 77 1196 83 1193 86 1205 89 1214 89 1221 93 1222 95 1218 96 1203 95 1216 101 1223 104 1223 108 1223 111 1212 109 1198 104 1214 115 1216 118 1211 123 1207 117 1200 113 1194 109 1205 120 1205 123 1201 123 1197 119 1193 115 1186 108 1183 108 1141 139 1152 149 1071 200 1072 211 1103 231 1115 245 1131 248 1148 259 1151 265 1152 271 1151 276 1149 280 1146 285 1141 289 1136 290 1149 302 1149 310 1149 315 1148 319 1142 321 1139 321 1133 320 1130 318 1127 329 1122 336 1114 341 1112 341 1103 341 1099 338 1093 333 1091 329 Z"}
        color={"lightblue"}l
      />
      <Text
        x={item.sentences[0].coordinateX}
        y={20}
        text={item.sentences[0].content}
        color="black"
        font={font}
      />
    </Canvas>
  )
}

export default Page