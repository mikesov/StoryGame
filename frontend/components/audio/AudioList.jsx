import { View, Text, FlatList, Image, ActivityIndicator, TouchableOpacity } from 'react-native';
import { useState, useEffect } from 'react';
import { useRouter } from 'expo-router';
import { Audio } from 'expo-av'

import styles from './audioList.style';
import { icons, COLORS } from '../../constants';
import { fetchAudio } from '../../hooks';

const AudioList = () => {
  const router = useRouter();
  const {audio, isLoading, error} = fetchAudio("audio");
  const [activeAudio, setActiveAudio] = useState(null);

  const [sound, setSound] = useState();

  async function playSound(audio) {
    console.log('Loading Sound');
    const { sound } = await Audio.Sound.createAsync({ uri: audio }, { shouldPlay: false });
    setSound(sound);

    console.log('Playing Sound');
    await sound.playAsync();
  }

  useEffect(() => {
    return sound
      ? () => {
          console.log('Unloading Sound');
          sound.unloadAsync();
        }
      : undefined;
  }, [sound]);
  
  return (
    <View style={styles.container}>
      {isLoading ? (
        <ActivityIndicator size='large' color={COLORS.primary} />
      ) : error ? (
        <Text style={styles.cardSubtitle}>Something went wrong</Text>
      ) : (
        <FlatList
          data={audio.data}
          renderItem={({item}) => (
            <View
              style={[styles.item(activeAudio, item), {flexDirection: "row"}]}
            >
              <TouchableOpacity
                style={styles.playButton}
                onPress={() => {
                  setActiveAudio(item);
                  playSound(item.audio);
                }}
              >
                <Image source={icons.playButton} style={styles.playIcon}/>
              </TouchableOpacity>
              <View
                style={styles.infoContainer}
              >
                <Text style={styles.itemInfo}>{item.id}</Text>
              </View>
            </View>
          )}
        />
      )}
    </View>
  )
}

export default AudioList;