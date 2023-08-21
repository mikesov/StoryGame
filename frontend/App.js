import { GluestackUIProvider, Text, Box, config } from '@gluestack-ui/themed'
import { StyleSheet, View, Button, Dimensions} from 'react-native';
import { useFonts } from 'expo-font';
import { PTSans_400Regular } from '@expo-google-fonts/pt-sans';
import * as SplashScreen from 'expo-splash-screen';
import { useCallback, useState, useEffect } from 'react';



export default function App() {

  let [fontsLoaded] = useFonts({
    PTSans_400Regular,
  });

  const onLayoutRootView = useCallback(async () => {
    if (fontsLoaded) {
      await SplashScreen.hideAsync();
    }
  }, [fontsLoaded]);

  if (!fontsLoaded) {
    return null;
  }

  return (
    <GluestackUIProvider config={config.theme} onLayout={ onLayoutRootView }>
      <Box style={styles.container}>
        <Text style={[styles.text, { fontFamily: 'PTSans_400Regular'}]}>Open up App.js to start working on your app!</Text>
      </Box>
      <Button
        onPress={() => setOrientation("landscape")}
        text="Change to Landscape"
        title='asd'
      >

      </Button>
    </GluestackUIProvider>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',
    width: '100',
  },
  text: {
    fontSize: 24,
    color: 'black',
    paddingVertical: 10,
  },
});
