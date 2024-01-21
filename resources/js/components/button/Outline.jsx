import React from "react"
import {Button} from '@chakra-ui/react'

export default function OutlineButton({name, onClick}){
  return (
    <Button color='#11047A' borderColor='#11047A'  variant='outline' size="md" onClick={onClick}>{name}</Button>
  )
}