import { useState, useCallback } from 'react';
import { 
  View,
  Text,
  TouchableOpacity,
  Image,
  FlatList,
  ActivityIndicator,
} from 'react-native';
import { Link, useRouter } from 'expo-router';
import { useFonts } from 'expo-font';
import * as SplashScreen from 'expo-splash-screen';

import { icons, SIZES, COLORS } from '../../constants';
import styles from './storiesList.style';
import { fetchStories } from '../../hooks';



const StoriesList = () => {
  const router = useRouter();
  const { stories, isLoading, error } = fetchStories("stories");
  const [activeStory, setActiveStory] = useState(null);
  // console.log(stories);

  return (
    <View style={styles.cardsContainer}>
      {isLoading ? (
        <ActivityIndicator size='large' color={COLORS.primary} />
      ) : error ? (
        <Text style={styles.cardSubtitle}>Something went wrong</Text>
      ) : (
        <FlatList
          data={stories.data}
          renderItem={({ item }) => (
            <Link
              href={`/(main_drawer)/stories/${item.id}`}
            >
              <View
                style={styles.card(activeStory, item)}
                onPress={() => {
                  setActiveStory(item);
                }}
              >
                <Image
                  style={styles.coverImage}
                  source={{ uri: item.cover}}
                />
                <Text style={styles.cardTitle(activeStory, item)}>{item.name}</Text>
                <View style={styles.subtitleContainer}>
                  <Text style={styles.cardSubtitle(activeStory, item)}>{item.reward}</Text>
                  <Image
                    source={icons.coin}
                    style={styles.coins}  
                  />
                </View>
                <Image
                  source={icons.heartOutline}
                  resizeMode="contain"
                  style={styles.favBtnImage}
                />
              </View>
            </Link>
          )}
          numColumns={2}
          keyExtractor={(item) => item.id}
          contentContainerStyle={{rowGap: SIZES.large}}
          columnWrapperStyle={{columnGap: SIZES.large}}
          showsVerticalScrollIndicator={false}
          style={styles.list}
        />
      )}
    </View>  
  );
};

export default StoriesList;