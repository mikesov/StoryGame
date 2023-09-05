import { useState } from 'react';
import { 
  View,
  Text,
  TextInput,
  TouchableOpacity,
  Image,
  FlatList
} from 'react-native';
import { useRouter } from 'expo-router';

import styles from './welcome.style';
import { icons, SIZES } from '../../constants';

const storyTypes = ["Genre 1", "Genre 2", "Genre 3"];

const Welcome = () => {
  const router = useRouter();
  const [activeSuggestion, setActiveSuggestion] = useState("Genre 1");

  return (
    <View>
      <View style={styles.container}>
        <Text style={styles.userName}>Hello Michael</Text>
        <Text style={styles.welcomeMessage}>Welcome to Story Game</Text>
      </View>

      <View style={styles.searchContainer}>
        <View style={styles.searchWrapper}>
          <TextInput 
            style={styles.searchInput}
            value=""
            onChange={() => {}}
            placeholder="Look for a story"
          />
        </View>

        <TouchableOpacity style={styles.searchBtn} onPress={() => {}}>
          <Image
            source={icons.search}
            resizeMode="contain"
            style={styles.searchBtnImage}
          />
        </TouchableOpacity>
      </View>

      <View style={styles.tabsContainer}>
        <FlatList
          data={storyTypes}
          renderItem={({ item }) => (
            <TouchableOpacity
              style={styles.tab(activeSuggestion, item)}
              onPress={() => {
                setActiveSuggestion(item);
                router.push(`/search/${item}`)
              }}
            >
              <Text style={styles.tabText(activeSuggestion, item)}>{item}</Text>
            </TouchableOpacity>
          )}
          keyExtractor={item => item}
          contentContainerStyle={{columnGap:SIZES.small}}
          horizontal
        />
      </View>
    </View>
  )
}

export default Welcome